<?php

namespace App\Http\Controllers\manager_module;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\manager_module\Call;

class callsController extends Controller
{
    public function updateCall(Request $req, $client_id, $call_id){
        $call = Call::find($call_id);
        $call->title = $req->title;
        $call->description = $req->description;
        $call->date = $req->date;
        if($call->save()){
            $req.session()->flash('msg', '*Call udpated successfully!');
            return redirect('/manager/show-client/' . $client_id.'/calls');
        }
        else{
            $req.session()->flash('msg', '*Could not update call!');
            return redirect('/manager/show-client/' . $client_id.'/calls');
        }
    }
    public function deleteCall(Request $req,$client_id, $call_id){
        $call = Call::find($call_id);
        if($call->delete()){
            $req.session()->flash('msg', '*Call deleted successfully!');
            return redirect('/manager/show-client/' . $client_id.'/calls');
        }
        else{
            $req.session()->flash('msg', '*Could not delete call!');
            return redirect('/manager/show-client/' . $client_id.'/calls');
        }
    }
    public function insertCall(Request $req, $client_id){
        $call = new Call();
        $call->title = $req->title;
        $call->description = $req->description;
        $call->date = $req->date;
        $call->client_id = $client_id;
        $call->manager_id = $req->session()->get('user_id');
        if($call->save()){
            $req.session()->flash('msg', '*Added new Call!');
            return redirect('/manager/show-client/' . $client_id.'/calls');
        }
        else{
            $req.session()->flash('msg', '*Could not add new call!');
            return redirect('/manager/show-client/' . $client_id.'/calls');
        }
    }
}