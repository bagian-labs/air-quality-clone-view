<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PenjelasanAplikasiController extends Controller
{
    public function index()
    {
        return view('components.penjelasan-aplikasi')->with(['penjelasan' => 'active']);
    }

}
