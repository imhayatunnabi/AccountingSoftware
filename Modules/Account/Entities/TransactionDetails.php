<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function transaction(){
        return $this->hasMany(Transaction::class,'transaction_type_id','id');
    }
}