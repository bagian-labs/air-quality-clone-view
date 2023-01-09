<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerEmail(Request $request)
    {
        // dd($request);
        try {
            $newUser = User::create([
                'email' => $request->validationCheckMail,
                'password' => bcrypt($request->validationCheckPassword),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->route('login-pages')->with(['mendaftar' => 'success']);
        } catch (\Exception $e) {
            return redirect()->route('login-pages')->withErrors(['errorMsg' => json_encode($e)]);
        }
    }
}