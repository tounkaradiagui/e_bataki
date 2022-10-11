<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_courriers_entrants");
            $table->foreign('id_courriers_entrants')
                ->references('id')
                ->on('courriers_entrants')
                ->onDelete('cascade');
                
            $table->string('element_reponse');

            $table->unsignedBigInteger("id_utilisateurs");
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
        Schema::dropIfExists('messages');
    }
}
