<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function getAirQuality()
    {
        $this->setLog();
        $this->setTime();

        $nilai = $this->database->getReference('Nilai')->getValue();

        $coTotal = $nilai['co'] + $nilai['co2'];

        function rentangKualitas($params)
        {
            if ($params <= 51) {
                return "Baik";
            } else if ($params > 51 && $params <= 100) {
                return "Sedang";
            } else if ($params > 100 && $params <= 200) {
                return "Tidak Sehat";
            } else if ($params > 200 && $params <= 300) {
                return "Sangat Tidak Sehat";
            } else if ($params > 300) {
                return "Berbahaya";
            }
        }
        return response()->json([
            'co'            => $nilai['co'],
            'co2'           => $nilai['co2'],
            'kelembapan'    => $nilai['kelembapan'],
            'suhu'          => $nilai['suhu'],
            'coTotal'       => $coTotal,
            'rentang'       => rentangKualitas($coTotal)
        ], Response::HTTP_OK);
    }

    public function calculateAirQuality(Request $request)
    {
        // dd($request);
        $ICo = 0;

        $Xx = doubleval($request->xx);

        $Ia = doubleval($request->ia);
        $Ib = doubleval($request->ib);

        $Xa = doubleval($request->xa);
        $Xb = doubleval($request->xb);

        $ICo = (($Ia - $Ib) / ($Xa - $Xb)) + ($Xx - $Xb) + $Ib;

        $Xx2 = doubleval($request->xx2);

        $Ia2 = doubleval($request->ia2);
        $Ib2 = doubleval($request->ib2);

        $Xa2 = doubleval($request->xa2);
        $Xb2 = doubleval($request->xb2);

        $Ico2 = (($Ia2 - $Ib2) / ($Xa2 - $Xb2)) + ($Xx2 - $Xb2) + $Ib2;

        $kelembapan = doubleval($request->kelembapan);
        $suhu = doubleval($request->suhu);

        if ($ICo <= 51) {
            $rentang = "Baik";
        } else if ($ICo > 51 && $ICo <= 100) {
            $rentang = "Sedang";
        } else if ($ICo > 100 && $ICo <= 200) {
            $rentang = "Tidak Sehat";
        } else if ($ICo > 200 && $ICo <= 300) {
            $rentang = "Sangat Tidak Sehat";
        } else if ($ICo > 300) {
            $rentang = "Berbahaya";
        }

        $this->database
            ->getReference('Nilai')
            ->set([
                'co'            => round($ICo, 3),
                'co2'           => round($Ico2, 3),
                'kelembapan'    => $kelembapan,
                'suhu'          => $suhu,
                'rentang'       => $rentang
            ]);

        return response()->json([
            'co'            => round($ICo, 3),
            'co2'           => round($Ico2, 3),
            'kelembapan'    => $kelembapan,
            'suhu'          => $suhu,
            'rentang'       => $rentang
        ], Response::HTTP_CREATED);
    }

    public function getLocation()
    {
        return response()->json($this->database->getReference('Lokasi')->getValue());
    }

    public function setLocation(Request $request)
    {
        $this->database
            ->getReference('Lokasi')
            ->set([
                'latitude'          => doubleval($request->lat),
                'longtitude'        => doubleval($request->long)
            ]);

        return response()->json([
            'latitude'          => doubleval($request->lat),
            'longtitude'        => doubleval($request->long)
        ], Response::HTTP_CREATED);
    }

    public function setTime()
    {
        $this->database
            ->getReference('Waktu')
            ->set([
                'jam'               => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now())->format('H:i:s'),
                'tanggal'           => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now())->format('d F'),
                'tahun'             => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now())->format('Y')
            ]);
    }

    public function getTime()
    {
        $time = $this->database->getReference('Waktu')->getValue();

        return response()->json([
            'jam'                   => $time['jam'],
            'tanggal'               => $time['tanggal'],
            'tahun'                 => $time['tahun']
        ], Response::HTTP_OK);
    }

    public function setLog()
    {
        $airQualityValue = $this->database->getReference('Nilai')->getValue();

        $log = app('firebase.firestore')
            ->database()
            ->collection('log_master')
            ->newDocument();
        $log->set([
            'co'    => $airQualityValue['co'],
            'co2'   => $airQualityValue['co2'],
            'time'  => \Carbon\Carbon::now()
        ]);
    }

    public function getLog()
    {
        $logs = app('firebase.firestore')->database()->collection('log_master')->documents();

        foreach ($logs as $log) {
            if ($log->exists()) {
                print json_encode($log->data(), JSON_PRETTY_PRINT);
            }
        }
    }
}