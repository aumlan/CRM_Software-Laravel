<?php

namespace App\Http\Controllers\clientUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientUser\Client;

class profileController extends Controller
{
    public function index(Request $req)
    {
        $user = Client::where('email', '=', $req->session()->get('username'))
            ->get()
            ->first();
        return view('clientUser.profile.index', compact('user'));
    }

    public function edit(Request $req)
    {
        $user = Client::where('email', '=', $req->session()->get('username'))
            ->get()
            ->first();
        return view('clientUser.profile.edit', compact('user'));
    }

    public function update(Request $req)
    {
        $user = Client::where('email', '=', $req->session()->get('username'))
            ->get()
            ->first();

        if ($user->password == $req->password) {
            $req->validate([
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

            $user->username = $req->session()->get('username');;
            $user->full_name = $req->full_name;
            $user->contact_no = $req->contact_no;
            $user->email = $req->email;
            $user->address = $req->address;
            $user->country = $req->country;
            $user->gender = $req->gender;
            $user->dob = $req->dob;


            if ($user->save()) {
                return view('clientUser.profile.index', compact('user'));
            } else {
                return back();
            }
        } else {
            $req->session()->flash('error', 'Password is incorrect');
            return back();
        }
    }
}