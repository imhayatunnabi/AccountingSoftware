<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Account\Entities\TransactionType;

class TransactionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $transactionTypes = TransactionType::all();
        return view('account::accounts.pages.transactionType.index',compact('transactionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('account::accounts.pages.transactionType.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required',
        ]);
        TransactionType::create([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        alert()->success('Transaction type created successfully');
        return to_route('transaction.type.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('account::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $transactionType = TransactionType::find($id);
        return view('account::accounts.pages.transactionType.edit',compact('transactionType'));
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $transactionType = TransactionType::find($id);
        $request->validate([
            'name'=>'required',
            'status'=>'required',
        ]);
        $transactionType->update([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        alert()->success('Transaction type updated successfully');
        return to_route('transaction.type.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $transactionType = TransactionType::find($id)->delete();
        alert()->error('Transaction type deleted successfully');
        return to_route('transaction.type.index');
    }
}
