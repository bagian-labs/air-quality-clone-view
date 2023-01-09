<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function storeTemp(Request $request)
    {
        $this->database
            ->getReference('Nilai')
            ->set([
                'co'            => round(doubleval($request['co']), 2),
                'co2'           => round(doubleval($request['co2']), 2),
                'kelembapan'    => doubleval($request['kelembapan']),
                'suhu'          => doubleval($request['suhu'])
            ]);

        return response()->json('data has been created');
    }
}
