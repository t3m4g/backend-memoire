<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinataires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->string('nom_prenom');
            $table->integer('telephone');
            $table->string('email');
            $table->timestamps();

            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinataires');
    }
};
