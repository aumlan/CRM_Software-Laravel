<?php

namespace App\Http\Controllers\clientUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clientUser\Proposal;

class companylistController extends Controller
{
    public function index()
    {
        $companies = DB::table('company')
            ->join('manager', 'company.manager_id', '=', 'manager.id')
            ->select('company.*', 'manager.full_name')
            ->get();
        return view('clientUser.companylist.index', compact('companies'));
    }

    public function lifecycle(Request $req, $id)
    {
        $company = DB::table('company')
            ->where('company.id', '=', $id)
            ->join('manager', 'company.manager_id', '=', 'manager.id')
            ->select('company.*', 'manager.*')
            ->get()
            ->first();

        if ($company != null) {
            $req->session()->put('company_id', $id);
            $req->session()->put('company_name', $company->company_name);
            $req->session()->put('company_contact', $company->contact_number);
            return view('clientUser.companylist.lifecycle', compact('company'));
        } else {
            return back();
        }
    }

    public function service(Request $req, $id)
    {
        $services = DB::table('service')
            ->where('service.company_id', '=', $id)
            ->select('*')
            ->get();

        if ($services != null) {
            $req->session()->put('company_id', $id);
            return view('clientUser.companylist.services', compact('services'));
        } else {
            return back();
        }
    }

    public function proposal(Request $req, $id)
    {
        $proposals = DB::table('proposal')
            ->where('proposal.client_id', '=', $req->session()->get('id'))
            ->where('proposal.company_id', '=', $id)
            ->join('client', 'proposal.client_id', '=', 'client.client_id')
            ->join('manager', 'proposal.manager_id', '=', 'manager.id')
            ->select('proposal.*', 'client.full_name', 'client.username')
            ->get();

        if ($proposals != null) {
            $req->session()->put('company_id', $id);
            return view('clientUser.companylist.proposals', compact('proposals'));
        } else {
            return back();
        }
    }

    public function optUpProposal(Request $req, $id, $id2)
    {
        $proposal = Proposal::find($id2);
        $proposal->status = 'Inactive';

        if ($proposal->save()) {
            return redirect()->route('companylist.proposal', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

    public function approveProposal(Request $req, $id, $id2)
    {
        $proposal = Proposal::find($id2);
        $proposal->status = 'Active';

        if ($proposal->save()) {
            return redirect()->route('companylist.proposal', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

}
