<?php

namespace App\Http\Controllers\clientUser;
use Illuminate\Support\Facades\HTTP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientUser\PendingTransactionLog;
use App\Models\clientUser\Transaction;

class ApiController extends Controller
{
    public function getAllPendingTransactions() {
        $transaction = PendingTransactionLog::get()->toJson(JSON_PRETTY_PRINT);
        return response($transaction, 200);
    }

    public function getAllTransactions(Request $req)
    {
        // logic to get all Transactions goes here
        $transactions = PendingTransactionLog::where('client_id', '=', $req->session()->get('id'))
            ->get();

        if ($transactions != null) {
            return view('clientUser.transaction.index', compact('transactions'));
        } else {
            return back();
        }
    }

    public function createTransaction(Request $request)
    {
        // logic to create a Transaction record goes here

        $request->validate([
            'type' => 'required',
            'company' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $transaction = new PendingTransactionLog;
        $transaction->type = $request->type;
        $transaction->company = $request->company;
        $transaction->description = $request->description;
        $transaction->price = $request->price;
        $transaction->creation_time = date('Y-m-d');
        $transaction->created_by = $request->session()->get('username');
        $transaction->client_id = $request->session()->get('id');

        if ($transaction->save()) {
            return view('clientUser.transaction.index', compact('transactions'));
            // return response()->json([
            //     "message" => "transaction record created"
            // ], 201);
        } else {
            return back();
            // $request->session()->flash('error', 'Fill all fields');
        }

    }

    public function viewTransaction(Request $request)
    {
        $resp = HTTP::get('http://localhost:3001/api/transaction');
        dd($resp->json());
    }
}
