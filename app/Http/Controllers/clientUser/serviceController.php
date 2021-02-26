<?php

namespace App\Http\Controllers\clientUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class serviceController extends Controller
{
    public function index(Request $req)
    {
        $services = DB::table('service_history')
            ->where('service_history.client_id', '=', $req->session()->get('id'))
            ->join('service', 'service_history.service_id', '=', 'service.id')
            ->join('company', 'service.company_id', '=', 'company.id')
            ->select('service_history.*', 'service.*', 'company.*')
            ->get();

        if ($services != null) {

            return view('clientUser.servicelist.index', compact('services'));
        } else {
            return back();
        }
    }
}
