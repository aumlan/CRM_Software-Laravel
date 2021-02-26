<?php

namespace App\Http\Controllers\manager_module;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\manager_module\Manager;
use App\Models\manager_module\Transaction;
use App\Models\manager_module\PendingTransaction;
use App\Models\manager_module\Company;
use Illuminate\Support\Facades\Http;

class transactionController extends Controller
{
    public function index(Request $req){
        $transactions = Transaction::where('manager_id', $req->session()->get('user_id'))->get();
        $manager = Manager::find($req->session()->get('user_id'));
        $pendingTransactions = PendingTransaction::where('manager_id', $req->session()->get('user_id'))
        ->get();
        return view('manager_module.home.transaction')
        ->with('transactions', $transactions)
        ->with('manager', $manager)
        ->with('pendingTransactions', $pendingTransactions);
    }  
    
    //contract_code
    public function sendMoney(Request $req){
        $manager = Manager::where('id',$req->session()->get('user_id'))
        ->where('email', $req->email)
        ->where('password', $req->password)
        ->get();
        if(isset($manager) && isset($manager[0]['balance'])){
            if($manager[0]['balance']<1){
                $req->session()->flash('msg', '*Your balance is empty!');
                return redirect('/manager/transaction')->withInput();
            }
            else if($manager[0]['balance']<$req->amount){
                $req->session()->flash('msg', '*Insufficient balance for the transaction!');
                return redirect('/manager/transaction')->withInput();
            }
            else if($manager[0]['balance']>$req->amount){
                $company = Company::where('manager_id',$manager[0]['id'])->get();

                $pendingTransaction = new PendingTransaction();
                $pendingTransaction->manager_id = $manager[0]['id'];
                $pendingTransaction->company_id = $company[0]['id'];
                $pendingTransaction->amount = $req->amount;
                $pendingTransaction->email = $req->email;
                $pendingTransaction->issue_date = date('Y-m-d H:i:s');
                $pendingTransaction->last_updated = date('Y-m-d H:i:s');
                $pendingTransaction->status = 'Pending';
                $pendingTransaction->save();

                $pendingTransactionList = json_encode($pendingTransaction);
                $response = Http::post('http://localhost:3000/transaction/transferData', ['data' => $pendingTransactionList]);
                
                echo $response->getBody();
                if($response->getBody()=='successfull!'){
                    echo $response->getBody();
                    if($pendingTransaction->save()){
                        $req->session()->flash('msg', '*Transaction is accepted and pending!');
                        return redirect('/manager/transaction');
                    }else{
                        $req->session()->flash('msg', '*failed to make transaction!');
                        return redirect('/manager/transaction')->withInput();
                    }
                }
                else{
                    echo "Oops, something went wrong!";
                }                
            }
            else{
                $req->session()->flash('msg', '*Invalid Email or Password!');
                return redirect('/manager/transaction')->withInput();
            }
            
        }
        else{
            $req->session()->flash('msg', '*Invalid Email or Password!');
            return redirect('/manager/transaction')->withInput();
        }
    }

    public function getValidData(Request $req){
        $validTransactionData = json_decode($req->tempData, true);
        $validTransaction = new Transaction();
        $validTransaction->manager_id= $validTransactionData->manager_id;
        $validTransaction->company_id = $validTransactionData->company_id;
        $validTransaction->amount= $validTransactionData->amount;
        $validTransaction->email= $validTransactionData->email;
        $validTransaction->transaction_date = date("Y-m-d H:i:s");
        $validTransaction->save();
        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        return json_encode($arr);
    }
}