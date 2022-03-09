<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();
            $table->string('club_name');
            $table->string('president_name');
            $table->string('secretary_name');
            $table->string('address');
            $table->double('total_deposit');
            $table->double('paid_amount');
            $table->double('due_amount');
            $table->string('payment_status');
            $table->string('club_logo');
            $table->string('created_by');
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
        Schema::dropIfExists('clubs');
        
    }
}
