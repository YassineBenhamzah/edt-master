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
        Schema::create('cautions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appeloffres_id')->unsigned();
            $table->bigInteger('projet_id')->unsigned();
            $table->string('montant');
            $table->string('typecaution')->default('Definitive');
            $table->date('datedebit');
            $table->string('bqdebit');
            $table->string('refchq');
            $table->date('dateconstitution');
            $table->date('daterestitution');
            $table->date('datecredit');
            $table->string('bqcredit');
            $table->string('moycredit')->default('Virement');
            $table->string('refcredit');
            $table->string('etat')->default('Constituee');
            $table->foreign('appeloffres_id')->references('id')->on('appeloffres')->onDelete('cascade');
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
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
        Schema::dropIfExists('cautions');
    }
};
