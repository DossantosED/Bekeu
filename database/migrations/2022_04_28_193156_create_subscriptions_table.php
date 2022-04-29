<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')
            ->references('id')
            ->on('states');
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
        Schema::create('cars', function (Blueprint $table) {
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
            Schema::dropIfExists('subscriptions');
        });
    }
}
