<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\AccountType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountSetup extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function accountType(){
        return $this->belongsTo(AccountType::class,'account_type_id','id');
    }
    public function transaction(){
        return $this->hasOne(Transaction::class,'account_id','id');
    }
}