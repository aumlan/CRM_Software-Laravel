<?php

namespace App\Http\Controllers\clientUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\clientUser\Client;
use App\Models\clientUser\Manager;
use App\Models\manager_module\Chat;

class chatController1 extends Controller
{
    // public function index()
    // {
    //     $messages = file_get_contents(base_path('resources/lang/messages.json'));
    //     return view('clientUser.chat.main')->with('messages', json_decode($messages, true));
    // }

    public function index(Request $req)
    {
        $managers = Manager::all();
        $client = Client::find($req->session()->get('id'));
        // echo $managers;
        return view('clientUser.chat.index', compact('managers', 'client'));
    }

    public function showManagerChat(Request $req, $id)
    {
        //return $req->session()->get('id');
        $managers = Manager::all();
        $client = Client::find($req->session()->get('id'));
        /*$chats = Chat::orderBy('chat.id', 'ASC')
            ->leftJoin('manager', 'manager.id', '=', 'chat.manager_id')
            ->select('manager.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
            ->where('chat.manager_id', $id)
            ->get();*/
        /*$chats = Chat::orderBy('chat.id', 'ASC')
            ->leftJoin('clients', 'clients.id', '=', 'chat.client_id')
            ->select('chat.body', 'chat.sent_at', 'chat.sent_from')
            ->where('chat.manager_id', $id)
            ->get();*/

        /*$chat = Chat::orderBy('chat.id', 'ASC')
            ->leftJoin('manager', 'manager.id', '=', 'chat.manager_id')
            ->select('manager.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
            ->where('manager.id', $id)
            ->get();*/

        $chats = Chat::orderBy('chat.id', 'ASC')
            ->where('manager_id', $id)
            ->where('client_id', $req->session()->get('id'))
            ->get();

        $manager = Manager::find($id);
        $manager_name =  $manager['full_name'];

        //return $chat;

        if (isset($chats[0])) {
            return view('clientUser.chat.chat')
                ->with('managers', $managers)
                ->with('clients', $client)
                ->with('chats', $chats)
                ->with('manager_name', $manager_name);
        } else {
            //print_r($chat);
            return view('clientUser.chat.chat')
                ->with('managers', $managers)
                ->with('clients', $client)
                ->with('manager_name', $manager_name)
                ->with('chats', $chats);
        }
    }

    public function getUser(Request $req)
    {
        $manager = Manager::where('full_name', 'LIKE', '%' . $req->userName . '%')->get()->first();
        return $manager;
    }

    public function sendMessage(Request $req)
    {
        $manager = Manager::where('full_name', $req->clientName)->get()->first();
        $manager_id = $manager['id'];

        $chat = new Chat();
        $chat->body = $req->message;
        $chat->manager_id = $manager['id'];
        $chat->client_id = $req->session()->get('id');
        $chat->sent_from = 'Client';
        $chat->sent_at = date("Y-m-d H:m:s");

        if ($chat->save()) {

            $chat = Chat::orderBy('chat.id', 'DESC')
                ->where('manager_id', $manager_id)
                ->where('client_id', $req->session()->get('id'))
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
        $client = Manager::where('full_name', $req->clientName)->get()->first();
        $client_id = $client['id'];

        /*$chat = Chat::orderBy('chat.id', 'DESC')
            ->leftJoin('client', 'client.client_id', '=', 'chat.client_id')
            ->select('client.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
            ->where('client.client_id', $client_id)
            ->get();*/

        $chat = Chat::orderBy('chat.id', 'DESC')
            ->where('manager_id', $client_id)
            ->where('client_id', $req->session()->get('id'))
            ->get();

        if (isset($chat[0])) {
            return $chat;
        } else {
            //print_r($chat);
            return 'Failed!';
        }
    }
}



// <?php

// namespace App\Http\Controllers\clientUser;
// use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
// use App\Models\manager_module\Client;
// use App\Models\manager_module\Manager;
// use App\Models\manager_module\Chat;

// class chatController1 extends Controller
// {
//     public function index(Request $req){
//         $clients = Client::all();
//         $manager = Manager::find($req->session()->get('user_id'));
//         return view('manager_module.chat.index')
//         ->with('clients', $clients)
//         ->with('manager', $manager);
//     }

//     public function showManagerChat(Request $req, $client_id){
//         $clients = Client::all();
//         $manager = Manager::find($req->session()->get('user_id'));
//         $chat = Chat::orderBy('chat.id', 'ASC')
//         ->leftJoin('clients', 'clients.id','=','chat.client_id')
//         ->select('clients.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
//         ->where('clients.id',$client_id)
//         ->get();
//         $client = Client::find($client_id);
//         $client_name =  $client['full_name'];
        
//         if(isset($chat[0])){
//             return view('manager_module.chat.chat')
//             ->with('clients', $clients)
//             ->with('manager', $manager)
//             ->with('chat', $chat)
//             ->with('client_name', $client_name);
//         }
//         else{
//             //print_r($chat);
//             return view('manager_module.chat.chat')
//             ->with('clients', $clients)
//             ->with('manager', $manager)
//             ->with('client_name', $client_name)
//             ->with('chat', $chat);
//         }
//     }

//     public function getUser(Request $req){
//         $userName = $req->userName;
//         $client = Client::where('full_name','LIKE','%'.$req->userName.'%')->get()->first();
//         return $client;
//     }

//     public function sendMessage(Request $req){
//         $client = Client::where('full_name',$req->clientName)->get()->first();
//         $client_id = $client['id'];

//         $chat = new Chat();
//         $chat->body = $req->message;
//         $chat->client_id = $client['id'];
//         $chat->manager_id = $req->session()->get('user_id');
//         $chat->sent_from = 'Manager';
//         $chat->sent_at = date("Y-m-d H:m:s");
        
//         if($chat->save()){
            
//             $chat = Chat::orderBy('chat.id', 'DESC')
//             ->leftJoin('clients', 'clients.id','=','chat.client_id')
//             ->select('clients.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
//             ->where('clients.id',$client_id)
//             ->get();
            
//             if(isset($chat[0])){
//                 return $chat;
//             }
//             else{
//                 //print_r($chat);
//                 return 'Failed!';
//             }
//         }
//         else{
//             return 'Unsucessful!';
//         }
//     }

//     public function getChat(Request $req){
//         $client = Client::where('full_name',$req->clientName)->get()->first();
//         $client_id = $client['id'];
        
//         $chat = Chat::orderBy('chat.id', 'DESC')
//         ->leftJoin('clients', 'clients.id','=','chat.client_id')
//         ->select('clients.full_name', 'chat.body', 'chat.sent_at', 'chat.sent_from')
//         ->where('clients.id',$client_id)
//         ->get();
        
//         if(isset($chat[0])){
//             return $chat;  
//         }
//         else{
//             //print_r($chat);
//             return 'Failed!';
//         }
//     }
// }