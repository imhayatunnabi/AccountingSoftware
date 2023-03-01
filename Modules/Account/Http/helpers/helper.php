<?php

use Modules\Account\Entities\Transaction;
if (!function_exists('balance')) {
    function balance($id){
        $transaction = Transaction::where('account_id',$id);
        $cashIn = $transaction->where('status',true)->sum('amount');
        $cashOut = $transaction->where('status',false)->sum('amount');
        $remainingbalance = $cashIn - $cashOut;
        return $remainingbalance;
    }
}