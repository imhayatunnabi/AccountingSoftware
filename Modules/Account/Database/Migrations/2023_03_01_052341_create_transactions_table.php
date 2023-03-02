<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('account_setups');
            $table->foreignId('transaction_type_id')->constrained('transaction_types');
            $table->string('payable',120);
            $table->double('amount')->nullable();
            $table->double('due')->nullable();
            $table->boolean('status')->default(0);
            // 0 for cash out 1 for cash in
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};