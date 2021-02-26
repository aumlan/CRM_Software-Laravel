<?php

namespace App\Http\Controllers\manager_module;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\insertProposalValidation;
use App\Http\Requests\updateProposalValidation;
use App\Models\manager_module\Client;
use App\Models\manager_module\Proposal;
use App\Models\manager_module\Company;

class proposalsController extends Controller
{
    public function insertProposal(insertProposalValidation $req, $client_id)
    {
        $company = Company::where('manager_id', $req->session()->get('user_id'))->get()->first();
        $proposal = new Proposal();
        $proposal->title = $req->title;
        $proposal->subject = $req->subject;
        $proposal->body = $req->body;
        $proposal->customer_name = $req->customer_name;
        $proposal->starting_date = $req->starting_date;
        $proposal->deadline_date = $req->deadline_date;
        $proposal->status = $req->status;
        $proposal->address = $req->address;
        $proposal->city = $req->city;
        $proposal->state = $req->state;
        $proposal->country = $req->country;
        $proposal->zip_code = $req->zip_code;
        $proposal->email = $req->email;
        $proposal->phone = $req->phone;
        $proposal->item = $req->item;
        $proposal->quantity = $req->quantity;
        $proposal->rate = $req->rate;
        $proposal->client_id = $client_id;
        $proposal->manager_id = $req->session()->get('user_id');
        $proposal->company_id = $company['id'];

        if ($proposal->save()) {
            $req . session()->flash('msg', '*Added proposal successfully!');
            return redirect('/manager/show-client/' . $client_id . '/proposals');
        } else {
            $req . session()->flash('msg', '*Could not insert proposal!');
            return redirect('/manager/show-client/' . $client_id . '/proposals')->withInput();
        }
    }

    public function updateProposal(updateProposalValidation $req, $client_id, $proposal_id)
    {
        $proposal = Proposal::find($proposal_id);
        $proposal->title = $req->title;
        $proposal->subject = $req->subject;
        $proposal->body = $req->body;
        $proposal->customer_name = $req->customer_name;
        $proposal->starting_date = $req->starting_date;
        $proposal->deadline_date = $req->deadline_date;
        $proposal->status = $req->status;
        $proposal->address = $req->address;
        $proposal->city = $req->city;
        $proposal->state = $req->state;
        $proposal->country = $req->country;
        $proposal->zip_code = $req->zip_code;
        $proposal->email = $req->email;
        $proposal->phone = $req->phone;
        $proposal->item = $req->item;
        $proposal->quantity = $req->quantity;
        $proposal->rate = $req->rate;

        if ($proposal->save()) {
            $req . session()->flash('msg', '*Updated proposal successfully!');
            return redirect('/manager/show-client/' . $client_id . '/proposals');
        } else {
            $req . session()->flash('msg', '*Could not update proposal!');
            return redirect('/manager/show-client/' . $client_id . '/proposals')->withInput();
        }
    }


    public function deleteProposal(Request $req, $client_id, $proposal_id)
    {
        $proposal = Proposal::find($proposal_id);
        if ($proposal->delete()) {
            $req . session()->flash('msg', '*Deleted Proposals!');
            return redirect('/manager/show-client/' . $client_id . '/proposals');
        } else {
            $req . session()->flash('msg', '*Could not delete Proposal!');
            return redirect('/manager/show-client/' . $client_id . '/proposals');
        }
    }

    public function showProposalPDF(Request $req, $client_id, $proposal_id){
        $proposal = Proposal::where('proposal.id', $proposal_id)
        ->leftJoin('company', 'company.id','=','proposal.company_id')
        ->leftJoin('manager', 'manager.id','=','proposal.manager_id')
        ->get()->first();
        return view('manager_module.clients.print-proposal')
        ->with('proposal', $proposal);
    }
}
