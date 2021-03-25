<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('uuid')->unique();
            $table->string('from')->nullable();
            $table->string('from_lat')->nullable();
            $table->string('from_long')->nullable();
            $table->string('to')->nullable();
            $table->string('to_lat')->nullable();
            $table->string('to_long')->nullable();
            $table->string('meeting_point')->nullable();
            $table->string('ship_name')->nullable();
            $table->string('direction')->nullable();
            $table->timestamp('pickup_datetime')->nullable();
            $table->timestamp('return_datetime')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->integer('passenger')->nullable();
            $table->integer('large_cases')->nullable();
            $table->integer('small_cases')->nullable();
            $table->enum('payment_method', ['1', '2', '3'])->nullable()->comment('1. Cash in Car, 2. Card in Car, 3. Pay Online');
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('instruction')->nullable();
            $table->float('fare');
            $table->enum('status', ['0', '1', '2', '3'])->default(0)->comment('0.Pending, 1. Accepted, 2. Completed, 4. Cancelled');
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
        Schema::dropIfExists('bookings');
    }
}
