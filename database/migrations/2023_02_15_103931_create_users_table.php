<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->foreignId('role_id')->references('id')
                                            ->on('roles')
                                            ->cascadeOnDelete();
            $table->string('username')->unique();
            $table->boolean('status')->default(0);
            $table->text('dob')->nullable();
            $table->text('address');
            $table->text('image')->nullable();
            $table->text('providerID')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};