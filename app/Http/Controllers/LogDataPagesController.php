<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class LogDataPagesController extends Controller
{
    public function index()
    {
        $data = app('firebase.firestore')->database()->collection('log_master')->orderBy('time', 'desc')->documents();

        if ($data->isEmpty()) {
            return collect();
        }

        $logs = collect($data->rows());

        // dd($data->rows());

        return view('components.logdata-maps', ['logs' => $logs])->with(['logdata-maps' => 'active']);
    }
}
