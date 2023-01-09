<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPagesController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view("components.dashboard");
        }
        return view('components.login-pages');
    }

    public function dashboard()
    {
        return view("components.dashboard");
        // if (Auth::check()) {
        //     return view("components.dashboard");
        // }
        // return view('components.login-pages')->with(['dashboard' => 'active']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login-pages');
    }

    public function emailLogin(Request $request)
    {
        // dd($request);
        try {
            $user = User::select('email')->where('email', "=", $request->validationCheckMail)->get();
            if (!empty($user->first()->email)) {
                if (Auth::attempt(['email' => $request->validationCheckMail, 'password' => $request->validationCheckPassword])) {
                    $request->session()->regenerate();

                    return redirect()->route('dashboard');
                } else {
                    return back()->withErrors(['passwordError' => "Maaf! Password anda salah mohon coba lagi."])->withInput();
                }
            } else {
                return back()->withErrors(['emailError' => "Maaf! Email atau Username yang anda masukkan tidak terdaftar."])->withInput();
            }
        } catch (\Exception $a) {
            return back()->withErrors(['sistemLoginError' => $a->getMessage()])->withInput();
        }
    }

    public function googleLogin(Request $request)
    {

        $checkUser = User::where('social_id', $request->uid)->first();

        if ($checkUser) {
            $checkUser->social_id = $request->uid;
            $checkUser->full_name = $request->displayName;
            $checkUser->image = $request->photoURL;
            $checkUser->email = $request->email;
            $checkUser->mobile_number = $request->phoneNumber;
            $checkUser->save();
            Auth::loginUsingId($checkUser->id, true);
            return response()->json([
                "status" => "success"
            ]);
        } else {
            $user = new User;
            $user->social_id = $request->uid;
            $user->full_name = $request->displayName;
            $user->image = $request->photoURL;
            $user->email = $request->email;
            $user->mobile_number = $request->phoneNumber;
            $user->user_type = "google";
            $user->save();
            Auth::loginUsingId($user->id, true);
            return response()->json([
                "status" => "success"
            ]);
        }
    }
}