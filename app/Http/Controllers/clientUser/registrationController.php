<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\clientUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientUser\Client;

class registrationController extends Controller
{
    public function index() {
        return view('clientUser.registration.index');
    }

    public function create(Request $req) {

        $req->validate([
            'username' => 'required',
            'password' => 'required',
            'full_name' => 'required',
            'contact_no' => 'required',
            'contact_no' => 'numeric',
            'email' => 'required', 
            'email' => 'email',
            'address' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ]);

        $user = new Client();

        $user->username = $req->username;
        $user->password = $req->password;
        $user->full_name = $req->full_name;
        $user->contact_no = $req->contact_no;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->country = $req->country;
        $user->gender = $req->gender;
        $user->dob = $req->dob;


        if ($user->save()) {
            return redirect()->route('login.index');
        } else {
            return back();
        }
    }
}
