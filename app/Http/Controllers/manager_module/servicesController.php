<?php

namespace App\Http\Controllers\manager_module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\manager_module\Service;
use App\Models\manager_module\Company;

class servicesController extends Controller
{
    public function index(Request $req){
        $company = Company::where('manager_id', $req->session()->get('user_id'))->get()->first();
        $services = Service::where('company_id', $company['id'])->get();
        //print_r($services[0]['id']);
        return view('manager_module.company.services')->with('services', $services);
    }

    public function insertService(Request $req){
        $company = Company::where('manager_id', $req->session()->get('user_id'))->get()->first();
        $service = new Service();
        $service->name = $req->name;
        $service->type = $req->type;
        $service->cost = $req->cost;
        $service->status = $req->status;
        $service->company_id = $company['id'];
        if($service->save()){
            $req->session()->flash('msg', 'New Service added successfully!');
            return redirect('/manager/services');
        }
        else{
            $req->session()->flash('msg', 'Failed to insert service!');
            return redirect('/manager/services');
        }
    }

    public function updateService(Request $req, $id){
        $service = Service::find($id);
        $service->name = $req->name;
        $service->type = $req->type;
        $service->cost= $req->cost;
        $service->status= $req->status;
        if($service->save()){
            $req->session()->flash('msg', 'Service updated successfully!');
            return redirect('/manager/services');
        }
        else{
            $req->session()->flash('msg', 'Failed to delete!');
            return redirect('/manager/services');
        }
    }

    public function deleteService(Request $req, $id){
        $service = Service::find($id);
        if($service->delete()){
            $req->session()->flash('msg', 'Service deleted successfully!');
            return redirect('/manager/services');
        }
        else{
            $req->session()->flash('msg', 'Failed to deleted service!');
            return redirect('/manager/services');
        }
    }
}