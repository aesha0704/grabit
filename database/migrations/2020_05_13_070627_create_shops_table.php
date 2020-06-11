<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_unique_id', 191)->nullable();
            $table->string('name', 191);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone', 13);
            $table->string('country_code', 20)->nullable();
            $table->string('avatar', 191)->nullable();
            $table->string('photo', 191)->nullable();
            $table->string('default_banner', 191)->nullable();
            $table->string('description', 191)->nullable();
            $table->double('offer_min_amount', 20, 2)->nullable()->default(0.00);
            $table->integer('offer_percent')->nullable()->default(0);
            $table->double('commission', 15, 8)->nullable()->default(0.00);
            $table->string('commission_type',191)->nullable();
            $table->integer('estimated_delivery_time')->nullable();
            $table->integer('otp')->nullable();
            $table->string('address');
            $table->string('maps_address');
            $table->double('latitude', 15, 8);
            $table->double('longitude', 15, 8);
            $table->tinyInteger('pure_veg')->nullable()->default(0);
            $table->tinyInteger('popular')->nullable()->default(0);
            $table->integer('rating')->nullable()->default(0);
            $table->integer('rating_status')->default(0);
            $table->enum('status', ['pending', 'active', 'inactive'])->default('pending');
            $table->enum('device_type', ['ios', 'android']);
            $table->text('device_token')->nullable();
            $table->string('device_id')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
