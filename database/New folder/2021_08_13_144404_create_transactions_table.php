<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $tabel->integer('travel_packages_id');
            $tabel->integer('users_id');
            $tabel->integer('additional_visa');
            $tabel->integer('transactional_visa');
            $table->string('transactional_status');// IN_CART, PANDDING, SUCCESS, CANCEL, FAILED
            $table->softDeleted();
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
}
