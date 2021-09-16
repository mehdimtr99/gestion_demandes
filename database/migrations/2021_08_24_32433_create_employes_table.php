<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('FullNameEmp');
            $table->string('Login')->unique();
            $table->string('Password');
            $table->enum('Type', ['standard', 'manager','directeur'])->default('standard');
            $table->unsignedBigInteger('groupe_Id')->default(1);
            $table->foreign('groupe_Id')->references('Id')->on('groupes');
            $table->unsignedInteger('AvailableDays')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
