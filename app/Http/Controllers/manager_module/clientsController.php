<?php

namespace App\Http\Controllers\manager_module;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\manager_module\Client;
use App\Models\manager_module\Call;
use App\Models\manager_module\Appointment;
use App\Models\manager_module\Note;
use App\Models\manager_module\Proposal;
use App\Models\manager_module\Manager;
use App\Models\manager_module\Service;
use App\Http\Requests\insertClientValidation;
use App\Http\Requests\clientEditValidation;
use Illuminate\Support\Facades\Http;

class clientsController extends Controller
{
    public function index(Request $req)
    {
        $clients = Client::all();
        return view('manager_module.clients.index')->with('clients', $clients);
    }

    public function insertClient(insertClientValidation $req)
    {
        $manager = Manager::find($req->session()->get('user_id'));

        $client = new Client();
        $client->full_name = $req->full_name;
        $client->phone = $req->phone;
        $client->address = $req->address;
        $client->city = $req->city;
        $client->country = $req->country;
        $client->website = $req->website;
        $client->billing_city = $req->billing_city;
        $client->billing_country = $req->country;
        $client->billing_zip = $req->billing_zip;
        $client->billing_state = $req->billing_state;
        $client->email = $req->email;
        $client->password = $req->password;
        $client->status = 'Active';
        $client->added_by = $manager['full_name'];
        $client->adding_date = date("Y-m-d");

        if ($client->save()) {
            $req . session()->flash('msg', '*Added new client successfully!');
            return redirect('/manager/clients');
        } else {
            $req . session()->flash('msg', '*Failed to add new client!');
            return redirect('/manager/clients')->withInput();
        }
    }

    public function showClient(Request $req, $id)
    {
        $client = Client::find($id);
        return view('manager_module.clients.profile')->with('client', $client);
    }

    public function showClientCall(Request $req, $id)
    {
        //DB::enableQueryLog(); // Enable query log
        $client = Client::find($id);
        $calls = Call::where('manager_id', $req->session()->get('user_id'))
            ->where('client_id', $id)
            ->get();
        //dd(DB::getQueryLog()); // Show results of log
        return view('manager_module.clients.calls')->with('client', $client)->with('calls', $calls);
    }
    public function showClientAppointment(Request $req, $id)
    {
        $appointments = Appointment::where('manager_id', $req->session()->get('user_id'))->where('clients_id', $id)->get();
        $client = Client::find($id);
        return view('manager_module.clients.appointments')->with('client', $client)->with('appointments', $appointments);
    }
    public function showClientChat(Request $req)
    {
        return view('manager_module.clients.chat');
    }
    public function showClientNote(Request $req, $id)
    {
        $notes = Note::where('manager_id', $req->session()->get('user_id'))->where('client_id', $id)->get();
        $client = Client::find($id);
        return view('manager_module.clients.notes')->with('client', $client)->with('notes', $notes);
    }
    public function showClientProposal(Request $req, $id)
    {
        $proposals = Proposal::where('manager_id', $req->session()->get('user_id'))->where('client_id', $id)->get();
        $client = Client::find($id);
        $services = Service::leftJoin('company', function ($join) {
            $join->on('service.company_id', '=', 'company.id');
        })->get();
        return view('manager_module.clients.proposals')
            ->with('client', $client)
            ->with('proposals', $proposals)
            ->with('services', $services);
    }
    public function showClientProfileEdit(Request $req, $id)
    {
        $client = Client::find($id);
        return view('manager_module.clients.profile_edit')->with('client', $client);
    }
    public function deleteClientProfile(Request $req, $id)
    {
        $client = Client::find($id);
        $client->delete();
        return $this->index($req);
    }
    public function udpateClient(clientEditValidation $req, $client_id)
    {
        $client = Client::find($client_id);
        $client->full_name = $req->full_name;
        $client->address = $req->address;
        $client->phone = $req->phone;
        $client->city = $req->city;
        $client->country = $req->country;
        $client->billing_city = $req->billing_city;
        $client->billing_state = $req->billing_state;
        $client->billing_zip = $req->billing_zip;
        $client->billing_country = $req->billing_country;
        $client->status = $req->status;

        if ($client->save()) {
            $req . session()->flash('msg', '*Client updated successfully!');
            return redirect('/manager/show-client/' . $client_id);
        } else {
            $req . session()->flash('msg', '*Failed to update client!');
            return redirect('/manager/show-client/' . $client_id . '/edit');
        }
    }
    public function getReportData(Request $req)
    {
        /*if ($response = Http::get('http://127.0.0.1:3000/clients/report')) {
            if ($response->getStatusCode() == 200) {
                $clients = json_decode($response->getBody(), true);
                $clientData = Client::groupBy('city')
                    ->selectRaw('city, count(*) AS count')
                    ->get();
                //http://localhost:3000/clients/getAllData
                //echo $clientData;
                return $response;

                // $array = array();
                // for($i=0; $i<count($clientData); $i++){
                //     //print_r ($clientData[$i]['city'].":".$clientData[$i]['count']);
                //     //array_push($array, $clientData[$i]['city'], $clientData[$i]['count']);
                //     array_push($array, array($clientData[$i]['city'], $clientData[$i]['count']));
                // }
                // var_dump($array);
                //return view('manager_module.clients.clients-report')->with('clients', $clients)->with('clientData', $clientData);
            } else {
                $req . session()->flash('msg', '*Failed to connect to Node Server!');
                return redirect('/manager/clients');
            }
        } else {
            $req . session()->flash('msg', '*Failed to connect to Node Server!');
            return redirect('/manager/clients');
        }*/

        $clients = Client::all();
        $clientData = Client::groupBy('city')
            ->selectRaw('city, count(*) AS count')
            ->get();
        return view('manager_module.clients.clients-report')->with('clients', $clients)->with('clientData', $clientData);
    }
}