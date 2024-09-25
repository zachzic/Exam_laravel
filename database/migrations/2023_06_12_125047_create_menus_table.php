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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nom_menu');
            $table->string('url');
            $table->string('type');
            $table->integer('parent');
            $table->integer('etat');
            $table->integer('deletable');
            $table->foreignId('admin_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('Page_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('menus');
    }
};
