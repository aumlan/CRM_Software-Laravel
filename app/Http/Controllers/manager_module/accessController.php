<?php

namespace App\Http\Controllers\manager_module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\manager_module\Manager;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\signUpValidation;
use App\Http\Requests\signInValidation;

class accessController extends Controller
{
    public function showLoginPage(Request $req){
        return view('manager_module.home.login');
    }

    public function loginVerification(signInValidation $req){
        $manager = Manager::where('email', $req->email)
        ->where('password', $req->password)
        ->first();
        
        if(isset($manager['user_name'])){
            if($manager['status']==0){
                $req->session()->put('user_name', $manager['user_name']);
                $req->session()->put('user_id', $manager['id']);
                $req->session()->put('user_status', $manager['status']);
                return redirect('/manager-dashboard');
            }
            else{
                $req->session()->flash('msg', 'You are no longer a valid User!');
    		    return redirect('/manager/login')->withInput();
            }
        }
        else{
    		$req->session()->flash('msg', 'Invalid Email or Password!');
    		return redirect('/manager/login')->withInput();
    	}
    }

    public function showSignOutPage(Request $req){
        $req->session()->flush();
        return redirect('/manager/login');
    }

    public function showSignUpPage(Request $req){
        return view('manager_module.home.sign-up');
    }

    public function storeManager(signUpValidation $req){
        if(Manager::where('email',$req->email)->get()->first()){
            $req->session()->flash('msg', 'Email already registered!');
            return redirect('/manager/signup')->withInput();
        }
        else{
            if ($req->password == $req->confirm_password) {
                $manager = new Manager();
                $manager->full_name = $req->full_name;
                $manager->email = $req->email;
                $manager->phone = $req->phone;
                $manager->dob = $req->dob;
                $manager->address = $req->address;
                $manager->city = $req->city;
                $manager->country = $req->country;
                $manager->company_name = $req->company_name;
                $manager->joining_date = date("Y-m-d");
                $manager->user_name = $req->user_name;
                $manager->password = $req->password;
                $manager->status = 0;
    
                if ($manager->save()) {
                    $req->session()->flash('msg', 'Sign Up Complete!\nWant to login?');
                    return redirect('/manager/login');
                } else {
                    return back();
                }
            } else {
                $req->session()->flash('msg', 'Passwords did not match!');
                return redirect('/manager/signup')->withInput();
            }
        }
    }

    public function showForgotPasswordPage(Request $req){
        $msg = $req->session()->get('msg');
        $req->session()->flush();
        $req->session()->flash('msg',$msg);
        return view('manager_module.home.forgot-password');
    }

    public function validateEmail(Request $req){
        $manager = Manager::where('email', $req->email)
        ->get()
        ->first();
        if(isset($manager)){
            $verification_code=(rand(1000,9999));
            print_r( $verification_code);
            $req->session()->put('verification_code', $verification_code);
            $req->session()->put('manager', $manager);
            $details =[
                'title'=>'Password Reset',
                'body'=>'Your password has been reset verification code is : '.$verification_code,
            ];
            Mail::to($manager['email'])
            ->send(new sendMail($details));
            return redirect('/manager/verify-code');
        }else{
            $req->session()->flash('msg', 'Sorry, the email you entered is not registered.');
            return redirect('/manager/forgot-password');
        }
    }

    public function showVerifyCodePage(Request $req){
        if($req->session()->has('verification_code') && $req->session()->has('manager')){
            return view('manager_module.home.verify-code')
            ->with('verification_code', $req->session()->get('verification_code'))
            ->with('manager', $req->session()->get('manager'));
        }
        else{
            $req->session()->flash('msg', 'Please enter the registered email!');
            return redirect('/manager/forgot-password');
        }
    }

    public function verifyCode(Request $req){
        if($req->session()->has('verification_code') && $req->session()->has('manager')){
            if($req->session()->get('verification_code')==$req->verification_code){
                return redirect('/manager/reset-password')
                ->with('manager', $req->session()->get('manager'));
            }
            else{
                $req->session()->flash('msg', 'The verification code did not match!');
                return redirect('/manager/verify-code');
            }
        }
        else{
            $req->session()->flash('msg', 'Please enter the registered email!');
            return redirect('/manager/forgot-password');
        }
    }
    
    public function showResetPasswordPage(Request $req){
        if($req->session()->has('manager')){
            $manager = $req->session()->get('manager');
            if(isset($manager) && $manager!=null){
                $req->session()->put('manager_id',$manager['id']);
                return view('manager_module.home.reset-password');
            }
            else{
                $req->session()->flash('msg', 'No user found!');
                return redirect('/manager/forgot-password');
            }
        }
        else{
            $req->session()->flash('msg', 'Please enter the registered email!');
            return redirect('/manager/forgot-password');
        }
    }

    public function changePassword(Request $req){
        if($req->password==$req->confirm_password){
            if($req->session()->has('manager_id')){
                $manager_id = $req->session()->get('manager_id');
                $manager = Manager::find($manager_id);
                $req->session()->put('manager', $manager);
                $manager->password = $req->password;
                if($manager->save()){
                    $req->session()->flash('msg', 'Password Reset Successfull!');
                    return redirect('/manager/login');
                }
                else{
                    $req->session()->flash('msg', 'Could not change password!');
                    return redirect('/manager/forgot-password');
                }
            }
            else{
                $req->session()->flash('msg', 'No user FOund!');
                return redirect('/manager/forgot-password');
            }
        }
        else{
            $req->session()->flash('msg', 'Passwords did not match!');
            return redirect('/manager/reset-password');
        }
    }
}