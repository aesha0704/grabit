<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->string('device_token')->nullable();
            $table->string('device_id')->nullable();
            $table->enum('device_type', ['ios', 'android'])->default('android');
            $table->enum('login_by', ['manual', 'google', 'facebook'])->default('manual');
            $table->string('social_unique_id')->nullable();
            $table->string('stripe_cust_id')->nullable();
            $table->double('wallet_balance', 8, 2)->default(0.00);
            $table->string('otp')->default(0);
            $table->string('braintree_id')->nullable();
            $table->enum('status', ['active', 'onbording'])->default('active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
}
