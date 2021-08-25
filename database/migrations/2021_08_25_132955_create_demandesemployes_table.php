<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesemployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandesemployes', function (Blueprint $table) {
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('Id')->on('employes');
            $table->unsignedBigInteger('demande_id');
            $table->foreign('demande_id')->references('Id')->on('demandes');
            $table->primary(['demande_id', 'employe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandesemployes');
    }
}
