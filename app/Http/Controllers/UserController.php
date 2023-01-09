<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function getAllUsers()
    {
        return response()->json($this->database->getReference('users/')->getValue());
    }

    public function storeUsers(Request $request)
    {
        $this->database
            ->getReference('users/' . $request['username'])
            ->set([
                'username' => $request['username']
            ]);

        return response()->json('users has been created');
    }
}
