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
    Schema::create('programmes', function (Blueprint $table) {
        $table->id();
        $table->string('nom_programme');
        $table->text('description');
        $table->string('image');
        $table->integer('etat');
        $table->integer('deletable');
        $table->foreignId('partenaire_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
        $table->timestamps();
    });

    Schema::create('partenaire_programme', function (Blueprint $table) {
        $table->foreignId('programme_id')->constrained()->cascadeOnDelete();
        $table->foreignId('partenaire_id')->constrained()->cascadeOnDelete();
        $table->primary(['programme_id', 'partenaire_id']);
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programmes');
    }
};
