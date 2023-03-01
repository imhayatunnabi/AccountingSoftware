<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Account\Entities\AccountType;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $accountTypes = AccountType::all();
        return view('account::accounts.pages.accountType.index',compact('accountTypes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('account::accounts.pages.accountType.create');
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
        AccountType::create([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        alert()->success('Account type created successfully');
        return to_route('account.type.index');
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
        $accountType = AccountType::find($id);
        return view('account::accounts.pages.accountType.edit',compact('accountType'));
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $accountType = AccountType::find($id);
        $request->validate([
            'name'=>'required',
            'status'=>'required',
        ]);
        $accountType->update([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        alert()->success('Account type updated successfully');
        return to_route('account.type.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $accountType = AccountType::find($id)->delete();
        alert()->error('Account type deleted successfully');
        return to_route('account.type.index');
    }
}