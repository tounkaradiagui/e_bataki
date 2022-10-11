<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourriersEntrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courriers_entrants', function (Blueprint $table) {
            $table->id();
            $table->string('num_reference');
            $table->string('objet');
            $table->string('expediteur');
           
            $table->unsignedBigInteger("id_secretaire");
            $table->foreign('id_secretaire')
                ->references('id')
                ->on('secretaires')
                ->onDelete('cascade');

                $table->unsignedBigInteger("id_utilisateurs")->nullable();
                $table->foreign('id_utilisateurs')
                    ->references('id')
                    ->on('utilisateurs')
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
        Schema::dropIfExists('courriers_entrants');
    }
}
