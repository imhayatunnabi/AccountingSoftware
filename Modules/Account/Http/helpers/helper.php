<?php

use Modules\Account\Entities\Transaction;
if (!function_exists('balance')) {
    function balance($id){
        $cashIn = Transaction::where('account_id',$id)->where('status',true)->sum('amount');
        $cashOut = Transaction::where('account_id',$id)->where('status',false)->sum('amount');
        $remainingbalance = $cashIn - $cashOut;
        return $remainingbalance;
    }
}