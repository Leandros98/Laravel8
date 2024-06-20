<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('contact_id');
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('pays_id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone');
            $table->string('adresse');
            $table->date('anniversaire');
            $table->string('entreprise');
            $table->string('fonction');
            $table->string('service');
            $table->string('titre');
            $table->string('site_web');
            $table->string('reseau_sociaux');
            $table->text('note');
            $table->boolean('favori');
            $table->timestamp('creation');
            $table->timestamps();
           $table->foreign('categorie_id')->references('categorie_id')->on('categories');
            $table->foreign('pays_id')->references('pays_id')->on('pays');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
