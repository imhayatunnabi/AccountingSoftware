<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\AccountType;
use Modules\Account\Entities\AccountSetup;
use Modules\Account\Entities\TransactionType;

class AccountDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Bank','Online Banking','Cash','Petty Cash'];
        foreach ($data as $key => $value) {
            AccountType::create([
                'name'=>$value,
                'status'=>1,
            ]);
        }
        $command = $this->command;
        if ($command instanceof Command) {
            $command->getOutput()->writeln("<fg=green> Account types created</>");
        }
        $accountType = AccountType::where('status',true)->get()->toArray();
        $randomArray = array_rand($accountType);
        $randomArrayKey = $accountType[$randomArray];
        $accounts = ['Bkash','DBBL','NAGAD','CITY Bank','Dhaka Bank','Upay'];
        foreach ($accounts as $key => $value) {
            AccountSetup::create([
                'name'=>$value,
                'account_type_id'=>$randomArrayKey['id'],
                'number'=>Str::random(10),
                'status'=>mt_rand(0, 1),
            ]);
        }
        $command = $this->command;
        if ($command instanceof Command) {
            $command->getOutput()->writeln("<fg=green> Accounts created</>");
        }
        $transactionTypes = ['Salary','Payment','Expence','Shopping','Student Fee','Internet Bill','House Rent','Electricity Bill','Water Bill','Entertainment Bill'];
        foreach ($transactionTypes as $key => $value) {
            TransactionType::create([
                'name'=>$value,
                'status'=>mt_rand(0, 1),
            ]);
        }
        $command = $this->command;
        if ($command instanceof Command) {
            $command->getOutput()->writeln("<fg=green> Transaction Types created</>");
        }
    }
}