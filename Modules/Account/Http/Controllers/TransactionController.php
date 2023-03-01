<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Account\Entities\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Modules\Account\Entities\AccountSetup;
use Modules\Account\Entities\TransactionDetails;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('account::accounts.pages.transaction.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $accounts = AccountSetup::where('status',true)->with('transaction')->get();
        return view('account::accounts.pages.transaction.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'payable'=>'required',
        ]);
        $transaction = Transaction::create([
            'payable'=>$request->payable,
            'account_id'=>$request->account_id,
            'status'=>$request->status,
        ]);
        $transaction = Transaction::find($transaction->id);
        $inputData = $request->all();
        for ($i = 0; $i < count($inputData['item_name']); $i++) {
            TransactionDetails::create([
                'transaction_id'=>$transaction->id,
                'item_name'=>$inputData['item_name'][$i],
                'item_price'=>$inputData['item_price'][$i],
                'quanity'=>$inputData['quantity'][$i],
                'subtotal'=>$inputData['quantity'][$i]*$inputData['item_price'][$i],
            ]);
        }
        $transactionDetails = TransactionDetails::where('transaction_id',$transaction->id)->get();
        $transaction->update([
            'amount'=> $transactionDetails->sum('subtotal'),
        ]);
        alert()->success('Transaction successfull');
        return to_route('account.transaction.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        return view('account::accounts.pages.transaction.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $accounts = AccountSetup::all();
        return view('account::accounts.pages.transaction.edit',compact('transaction','accounts'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $request->validate([
            'payable'=>'required',
        ]);
        $transaction->update([
            'payable'=>$request->payable,
            'account_id'=>$request->account_id,
            'status'=>$request->status,
        ]);
        alert()->success('Transaction update successfull');
        return to_route('account.transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transactionDetails = TransactionDetails::where('transaction_id',$transaction->id)->delete();
        $transaction->delete();
        alert()->success('Transaction has been deleted');
    }
    public function editDetails(Request $request, $transactionDetailsId){
        $transactionDetails = TransactionDetails::find($transactionDetailsId);
        $transaction = Transaction::find($transactionDetails->transaction_id);
        $transactionAmount = Transaction::find($transactionDetails->transaction_id,['amount'])->amount;
        $value = $transactionDetails->subtotal;
        $session = $request->session()->put('tmp',[$value]);
        $sessionTran = $request->session()->put('tmptrans',[$transactionAmount]);
        $sessionData=session('tmp');
        $sessionDataTran=session('tmptrans');
        $transactionDetails->update([
            'item_name'=>$request->item_name,
            'item_price'=>$request->item_price,
            'quanity'=>$request->quantity,
            'subtotal'=>$request->quantity*$request->item_price,
        ]);
            $transaction->update([
                'amount'=> $sessionDataTran[0] - $sessionData[0] + $transactionDetails->subtotal ,
            ]);
            session()->forget('tmp');
        alert()->success('Transaction details updated');
        return to_route('account.transaction.index');
    }
}
