<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Account\Entities\AccountSetup;
use Modules\Account\Entities\AccountType;

class AccountSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $accounts = AccountSetup::all();
        return view('account::accounts.pages.accountSetup.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $accountTypes = AccountType::where('status',true)->get();
        return view('account::accounts.pages.accountSetup.create',compact('accountTypes'));
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
            'type'=>'required',
            'number'=>'required',
            'status'=>'required',
        ]);
        AccountSetup::create([
            'name'=>$request->name,
            'account_type_id'=>$request->type,
            'number'=>$request->number,
            'status'=>$request->status,
        ]);
        alert()->success('Account created successfully');
        return to_route('account.setup.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('account::accounts.pages.accountSetup.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('account::accounts.pages.accountSetup.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}