<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->integer('phone');
            $table->string('username');
            $table->string('email')->unique();
        
            $table->string('password');
           
            $table->string('poste');
            $table->unsignedBigInteger("id_departement");
            $table->foreign('id_departement')
                ->references('id')
                ->on('departements')
                ->onDelete('cascade');
                
                $table->unsignedBigInteger("id_users");
                $table->foreign('id_users')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('utilisateurs');
    }
}
