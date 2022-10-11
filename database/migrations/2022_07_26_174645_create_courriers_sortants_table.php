<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourriersSortantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courriers_sortants', function (Blueprint $table) {
            $table->id();
            $table->string('num_reference');
            $table->string('objet');
            $table->string('destinateur');

            $table->unsignedBigInteger("id_utilisateurs");
            $table->foreign('id_utilisateurs')
                ->references('id')
                ->on('utilisateurs')
                ->onDelete('cascade');
 
            $table->unsignedBigInteger("id_courriers_entrants");
            $table->foreign('id_courriers_entrants')
                ->references('id')
                ->on('courriers_entrants')
                ->onDelete('cascade');
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
        Schema::dropIfExists('courriers_sortants');
    }
}
