<?php

namespace App\Http\Controllers\manager_module;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\manager_module\Client;
use App\Models\manager_module\Manager;
use App\Models\manager_module\Chat;

class chatController extends Controller
{
    public function index(Request $req)
    {
        $clients = Client::all();
        $manager = Manager::find($req->session()->get('user_id'));
        return view('manager_module.chat.index')
            ->with('clients', $clients)
            ->with('manager', $manager);
    }

    public function showClientChat(Request $req, $client_id)
    {
        $clients = Client::all();
        $manager = Manager::find($req->session()->get('user_id'));
        /*$chat = Chat::orderBy('chat.id', 'ASC')
            ->leftJoin('clients', 'clients.id', '=', 'chat.client_id')
            ->select('clients.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
            ->where('clients.id', $client_id)
            ->get();*/

        $chat = Chat::orderBy('chat.id', 'ASC')
            ->where('manager_id', $req->session()->get('user_id'))
            ->where('client_id', $client_id)
            ->get();
        $client = Client::find($client_id);
        $client_name =  $client['full_name'];

        if (isset($chat[0])) {
            return view('manager_module.chat.chat')
                ->with('clients', $clients)
                ->with('manager', $manager)
                ->with('chat', $chat)
                ->with('client_name', $client_name);
        } else {
            //print_r($chat);
            return view('manager_module.chat.chat')
                ->with('clients', $clients)
                ->with('manager', $manager)
                ->with('client_name', $client_name)
                ->with('chat', $chat);
        }
    }

    public function getUser(Request $req)
    {
        $userName = $req->userName;
        $client = Client::where('full_name', 'LIKE', '%' . $req->userName . '%')->get()->first();
        return $client;
    }

    public function sendMessage(Request $req)
    {
        $client = Client::where('full_name', $req->clientName)->get()->first();
        $client_id = $client['id'];

        $chat = new Chat();
        $chat->body = $req->message;
        $chat->client_id = $client['id'];
        $chat->manager_id = $req->session()->get('user_id');
        $chat->sent_from = 'Manager';
        $chat->sent_at = date("Y-m-d H:m:s");

        //return $chat;

        if ($chat->save()) {

            $chat = Chat::orderBy('chat.id', 'DESC')
                ->where('manager_id', $req->session()->get('user_id'))
                ->where('client_id', $client_id)
                ->get();

            /*$chat = Chat::orderBy('chat.id', 'DESC')
                ->leftJoin('clients', 'clients.id', '=', 'chat.client_id')
                ->select('clients.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
                ->where('clients.id', $client_id)
                ->get();*/

            if (isset($chat[0])) {
                return $chat;
            } else {
                //print_r($chat);
                return 'Failed to send!';
            }
        } else {
            return 'Unsucessful!';
        }
    }

    public function getChat(Request $req)
    {
        $client = Client::where('full_name', $req->clientName)->get()->first();
        $client_id = $client['id'];


        $chat = Chat::orderBy('chat.id', 'DESC')
            ->where('client_id', $client_id)
            ->where('manager_id', $req->session()->get('user_id'))
            ->get();
        /*$chat = Chat::orderBy('chat.id', 'DESC')
            ->leftJoin('clients', 'clients.id', '=', 'chat.client_id')
            ->select('clients.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
            ->where('clients.id', $client_id)
            ->get();*/

        if (isset($chat[0])) {
            return $chat;
        } else {
            print_r($client_id);
            print_r($req->session()->get('id'));
            return 'Failed to get chat!';
        }
    }
}