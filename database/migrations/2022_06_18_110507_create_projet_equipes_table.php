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
        Schema::create('projet_equipes', function (Blueprint $table) {
            $table->id("projet_equipes_id");
            $table->unsignedBigInteger("id_p");
            $table->foreign("id_p")->references("id")->on("projets");
            $table->unsignedBigInteger("id");
            $table->foreign("id")->references("id")->on("equipes");
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
        Schema::dropIfExists('projet_equipes');
    }
};
