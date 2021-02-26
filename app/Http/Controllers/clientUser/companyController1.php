<?php

namespace App\Http\Controllers\clientUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clientUser\Note;
use App\Models\clientUser\Appointment;
use App\Models\clientUser\Proposal;
class companyController1 extends Controller
{
    public function index(Request $req)
    {
        $companies = DB::table('affiliated_companies')->where('client_username', '=', $req->session()->get('username'))
            ->join('company', 'affiliated_companies.company_id', '=', 'company.id')
            ->join('manager', 'company.manager_id', '=', 'manager.id')
            ->select('*')
            ->get();
        return view('clientUser.company.index', compact('companies'));
    }

    public function lifecycle(Request $req, $id)
    {
        // $affiliated_company = AffiliatedCompany::where('affiliated_company_id', '=', $id)
        //                 ->where('client_username', '=', $req->session()->get('username'))
        //                 ->get()
        //                 ->first();

        $companies = DB::select(
            'select ac.*, m.*, c.*, client.client_id, client.username 
            from affiliated_companies ac, company c, manager m, client 
            where ac.client_username = :username and ac.affiliated_company_id = :id and ac.company_id = c.id and c.manager_id = m.id and ac.client_username=client.username',
            ['username' => $req->session()->get('username'), 'id' => $id]
        );

        if ($companies != null) {
            $company = $companies[0];
            $req->session()->put('company_id', $id);
            $req->session()->put('company_name', $company->company_name);
            $req->session()->put('company_contact', $company->contact_number);
            return view('clientUser.company.lifecycle', compact('company'));
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
            return view('clientUser.company.services', compact('services'));
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
            return view('clientUser.company.proposals', compact('proposals'));
        } else {
            return back();
        }
    }

    public function optUpProposal(Request $req, $id, $id2)
    {
        $proposal = Proposal::find($id2);
        $proposal->status = 'Inactive';

        if ($proposal->save()) {
            return redirect()->route('company.proposal', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

    public function approveProposal(Request $req, $id, $id2)
    {
        $proposal = Proposal::find($id2);
        $proposal->status = 'Active';

        if ($proposal->save()) {
            return redirect()->route('company.proposal', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

    public function createNote(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $manager = DB::table('affiliated_companies')
            ->where('affiliated_companies.affiliated_company_id', '=', $req->session()->get('company_id'))
            ->join('company', 'company.id', '=', 'affiliated_companies.company_id')
            ->select('company.manager_id')
            ->get()
            ->first();

        $note = new Note();

        $note->title = $req->title;
        $note->body = $req->body;
        $note->manager_id = $manager->manager_id;
        $note->client_id = $req->session()->get('id');
        $note->creation_date = date("Y-m-d");
        $note->posted_by = $req->session()->get('username');

        if ($note->save()) {
            return redirect()->route('company.note', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

    public function readNote(Request $req, $id)
    {
        $notes = DB::table('affiliated_companies')
            ->where('affiliated_companies.affiliated_company_id', '=', $id)
            ->join('company', 'affiliated_companies.company_id', '=', 'company.id')
            ->join('manager', 'company.manager_id', '=', 'manager.id')
            ->join('note', 'note.manager_id', '=', 'manager.id')
            ->where('note.client_id', '=', $req->session()->get('id'))
            ->join('client', 'note.client_id', '=', 'client.client_id')
            ->select('note.*', 'client.*', 'manager.company_name')
            ->get();

        if ($notes != null) {
            $req->session()->put('company_id', $id);
            return view('clientUser.company.notes', compact('notes'));
        } else {
            return back();
        }
    }

    public function updateNote(Request $req, $id, $id2)
    {
        $req->validate([
            'updatedTitle' => 'required',
            'updatedBody' => 'required',
        ]);
        
        $note = Note::find($id2);
        
        $note->title = $req->updatedTitle;
        $note->body = $req->updatedBody;

        if ($note->save()) {
            return redirect()->route('company.note', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

    public function deleteNote(Request $req, $id, $id2)
    {
        $note = Note::find($id2);

        if ($note !== null) {
            $note->delete();
            return redirect()->route('company.note', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

    public function createAppointment(Request $req, $id)
    {
        $req->validate([
            'title' => 'required',
            'body' => 'required',
            'date' => 'required'
        ]);

        $manager = DB::table('affiliated_companies')
            ->where('affiliated_companies.affiliated_company_id', '=', $req->session()->get('company_id'))
            ->join('company', 'company.id', '=', 'affiliated_companies.company_id')
            ->select('company.manager_id')
            ->get()
            ->first();

        $appointment = new Appointment();

        $appointment->title = $req->title;
        $appointment->body = $req->body;
        $appointment->appointment_date = $req->date;
        $appointment->creation_date = date("Y-m-d");
        $appointment->manager_id = $manager->manager_id;
        $appointment->clients_id = $req->session()->get('id');
        $appointment->posted_by = $req->session()->get('username');

        if ($appointment->save()) {
            return redirect()->route('company.appointment', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

    public function readAppointment(Request $req, $id)
    {
        $appointments = DB::table('appointment')
            ->join('manager', 'appointment.manager_id', '=', 'manager.id')
            ->join('client', 'appointment.clients_id', '=', 'client.client_id')
            ->join('company', 'manager.company_name', '=', 'company.company_name')
            ->where('appointment.clients_id', '=', $req->session()->get('id'))
            ->where('appointment.manager_id', '=', $id)
            ->select('appointment.*', 'client.*', 'manager.company_name')
            ->get();

        if ($appointments != null) {
            $req->session()->put('company_id', $id);
            return view('clientUser.company.appointments', compact('appointments'));
        } else {
            return back();
        }
    }

    public function updateAppointment(Request $req, $id, $id2)
    {
        $req->validate([
            'updatedDate' => 'required',
            'updatedTitle' => 'required',
            'updatedBody' => 'required',
        ]);
        
        $appointment = Appointment::find($id2);

        $appointment->appointment_date = $req->updatedDate;
        $appointment->title = $req->updatedTitle;
        $appointment->body = $req->updatedBody;

        if ($appointment->save()) {
            return redirect()->route('company.appointment', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }

    public function deleteAppointment(Request $req, $id, $id2)
    {
        $appointment = Appointment::find($id2);

        if ($appointment !== null) {
            $appointment->delete();
            return redirect()->route('company.appointment', $req->session()->get('company_id'));
        } else {
            return back();
        }
    }
}
