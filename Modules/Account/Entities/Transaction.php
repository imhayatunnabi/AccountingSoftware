<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\TransactionType;
use Modules\Account\Entities\TransactionDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function account(){
        return $this->belongsTo(AccountSetup::class,'account_id','id');
    }
    public function transactionType(){
        return $this->belongsTo(TransactionType::class,'transaction_type_id','id');
    }
    public function transactionDetails(){
        return $this->hasMany(TransactionDetails::class,'transaction_id','id');
    }
}