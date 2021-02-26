<?php

namespace App\Http\Controllers\clientUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clientUser\Proposal;

class proposalController extends Controller
{
    public function index(Request $req)
    {
        $proposals = DB::table('proposal')
            ->join('clients', 'proposal.client_id', '=', 'clients.id')
            ->where('clients.email', '=', $req->session()->get('username'))
            ->select('proposal.*', 'clients.full_name', 'clients.email')
            ->get();

        if ($proposals != null) {
            return view('clientUser.proposallist.index', compact('proposals'));
        } else {
            return back();
        }
    }

    public function optUpProposal(Request $req, $id)
    {
        $proposal = Proposal::find($id);
        $proposal->status = 'Inactive';

        if ($proposal->save()) {
            return redirect()->route('proposal.index');
        } else {
            return back();
        }
    }

    public function approveProposal(Request $req, $id)
    {
        $proposal = Proposal::find($id);
        $proposal->status = 'Active';

        if ($proposal->save()) {
            return redirect()->route('proposal.index');
        } else {
            return back();
        }
    }
}