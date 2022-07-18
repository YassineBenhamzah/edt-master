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
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('client_id')->unsigned();
            $table->string('objet');
            $table->string('ref');
            $table->string('montant_ht');
            $table->string('montant_ttc');
            $table->string('type_projet');
            $table->date('dateosc');
            $table->string('delai_execution');
            $table->string('etattech');
            $table->string('etatfin');
            $table->foreign('client_id')->references("id")->on("clients")->onDelete("cascade");
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
        Schema::dropIfExists('projets');
    }
};
