<?php

namespace App\Http\Controllers\clientUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientUser\Client;

class loginController extends Controller
{
    public function index()
    {
        return view('clientUser.login.index');
    }

    public function verify(Request $req)
    {

        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Client::where('email', $req->username)
            ->where('password', $req->password)
            ->first();

        if ($user != null) {
            $req->session()->put('id', $user['id']);
            $req->session()->put('username', $user['email']);
            $req->session()->put('type', 'client');

            return redirect()->route('home.index');
        } else {
            $req->session()->flash('error', 'Invalid Username or Password');
            return redirect()->route('login.index');
        }
    }
}