<?php

namespace App\Http\Controllers\manager_module;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\manager_module\Note;
use App\Models\manager_module\Client;

class notesController extends Controller
{
    public function insertNote(Request $req, $client_id){
         $client = Client::find($client_id);
         $note = new Note();
         $note->title = $req->title;
         $note->body = $req->body;
         $note->creation_date =$req->creation_date;
         $note->manager_id = $req->session()->get('user_id');
         $note->client_id = $client_id;
         if($note->save()){
             $req.session()->flash('msg', '*Added note successfully!');
             return redirect('/manager/show-client/'.$client_id.'/notes');
         }
         else{
             $req.session()->flash('msg', '*Could not insert note!');
             return redirect('/manager/show-client/'.$client_id.'/notes');
         }
    }

    
    public function updateNote(Request $req, $client_id, $note_id){
        $note = Note::find($note_id);
        $note->title = $req->title;
        $note->body = $req->body;
        $note->creation_date = $req->creation_date;
        if($note->save()){
        $req.session()->flash('msg', '*Updated Note!');
        return redirect('/manager/show-client/'.$client_id.'/notes');
        }
        else{
        $req.session()->flash('msg', '*Could not update note!');
        return redirect('/manager/show-client/'.$client_id.'/notes');
        }
    }

    public function deleteNote(Request $req,$client_id,$note_id){
        $note = Note::find($note_id);
        if($note->delete()){
         $req.session()->flash('msg', '*Deleted Note!');
         return redirect('/manager/show-client/'.$client_id.'/notes');
        }
        else{
         $req.session()->flash('msg', '*Could not delete Note!');
         return redirect('/manager/show-client/'.$client_id.'/notes');
        }
    }
}