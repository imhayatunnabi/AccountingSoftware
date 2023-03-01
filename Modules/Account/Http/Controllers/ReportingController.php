<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Modules\Account\Entities\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Modules\Account\Entities\AccountSetup;

class ReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $income = Transaction::where('status',true)->get();
        $expense = Transaction::where('status',false)->get();
        $from = Carbon::parse(sprintf(
            '%s-%s-01',
            request()->query('y', Carbon::now()->year),
            request()->query('m', Carbon::now()->month)
        ));
        $to      = clone $from;
        $to->day = $to->daysInMonth;
        if(request()->query('entity') == '0'){
            $transactions = Transaction::whereBetween('created_at', [$from, $to])->where('status',false)->get();
            $sum = $transactions->sum('amount');
        }elseif(request()->query('entity') == '1'){
            $transactions = Transaction::whereBetween('created_at', [$from, $to])->where('status',true)->get();
            $sum = $transactions->sum('amount');
        }else{
            $transactions = Transaction::whereBetween('created_at', [$from, $to])->get();
            $sum = $transactions->sum('amount');
        }
        if($transactions->count() > 0){
            alert()->success('Generated report');
        }else{
            alert()->error('no transactions has been on this report month');
        }
        $accounts = AccountSetup::with('transaction')->get();
        return view('account::accounts.pages.report.index',compact('transactions','accounts'));
    }
}