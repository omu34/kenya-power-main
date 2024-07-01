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
        Schema::create('header_navigations', function (Blueprint $table) {
            $table->id();
            $table->string('header1');
            $table->string('header2');
            $table->string('header3');
            $table->string('header4');
            $table->string('header5');
            $table->string('header6');
            $table->string('header7');
            $table->string('header8');
            $table->string('header9');
            $table->string('header10');
            $table->string('header12');
            $table->string('header19');
            $table->string('image');
            $table->text('header_navigation_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_navigations');
    }
};
