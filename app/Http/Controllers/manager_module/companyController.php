<?php

namespace App\Http\Controllers\manager_module;
use App\Http\Controllers\Controller;
use App\Http\Requests\companyEditValidation;
use Illuminate\Http\Request;
use App\Models\manager_module\Company;

class companyController extends Controller
{
    public function index(Request $req){
        $company = Company::where('manager_id',$req->session()->get('user_id'))->get()->first();
        return view('manager_module.company.index')->with('company', $company);
    }
    public function editCompany(Request $req, $id){
        $company = Company::find($id);
        return view('manager_module.company.edit')->with('company', $company);
    }
    public function updateCompany(companyEditValidation $req, $id){
        $company = Company::find($id);
        $company->company_name = $req->company_name;
        $company->company_address = $req->company_address;
        $company->contact_number = $req->contact_number;
        $company->type = $req->type;
        if($company->save()){
            $req.session()->flash('msg', '*Updated company successfully!');
            return redirect('/manager/company');
        }
        else{
            $req.session()->flash('msg', '*Failed to update company!');
            return redirect('/manager/company/edit/$id')->withInput();
        }
    }
}