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
            $table->id();
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('pays_id');
            $table->string('nom')->nullable();
            $table->string('prenom')->unique();
            $table->string('email')->nullable();
            $table->string('telephone')->unique();
            $table->string('adresse')->nullable();
            $table->date('anniversaire')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('fonction')->nullable();
            $table->string('service')->nullable();
            $table->string('titre')->nullable();
            $table->string('site_web')->nullable();
            $table->string('reseau_sociaux')->nullable();
            $table->text('note')->nullable();
            $table->boolean('favori')->nullable();
            $table->timestamps();
           $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('pays_id')->references('id')->on('pays');

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
