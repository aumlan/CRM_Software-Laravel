<?php

namespace App\Http\Controllers\manager_module;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\manager_module\Appointment;
use App\Models\manager_module\Client;

class appointmentsController extends Controller
{
   public function insertAppointment(Request $req, $client_id){
       $client = Client::find($client_id);
        $appointment = new Appointment();
        $appointment->title = $req->title;
        $appointment->body = $req->body;
        $appointment->creation_date =$req->creation_date;
        $appointment->appointment_date = $req->appointment_date;
        $appointment->manager_id = $req->session()->get('user_id');
        $appointment->clients_id = $client_id;
        if($appointment->save()){
            $req.session()->flash('msg', '*Fixed appointment successfully!');
            return redirect('/manager/show-client/'.$client_id.'/appointments');
        }
        else{
            $req.session()->flash('msg', '*Could not fix appointment!');
            return redirect('/manager/show-client/'.$client_id.'/appointments');
        }
   }

   public function updateAppointment(Request $req, $client_id, $appointment_id){
       $appointment = Appointment::find($appointment_id);
       $appointment->title = $req->title;
       $appointment->body = $req->body;
       $appointment->appointment_date = $req->appointment_date;
       if($appointment->save()){
        $req.session()->flash('msg', '*Updated appointment!');
        return redirect('/manager/show-client/'.$client_id.'/appointments');
       }
       else{
        $req.session()->flash('msg', '*Could not update appointment!');
        return redirect('/manager/show-client/'.$client_id.'/appointments');
       }
   }

   public function deleteAppointment(Request $req,$client_id, $appointment_id){
       $appointment = Appointment::find($appointment_id);
       if($appointment->delete()){
        $req.session()->flash('msg', '*Deleted appointment!');
        return redirect('/manager/show-client/'.$client_id.'/appointments');
       }
       else{
        $req.session()->flash('msg', '*Could not deleted appointment!');
        return redirect('/manager/show-client/'.$client_id.'/appointments');
       }
   }
}