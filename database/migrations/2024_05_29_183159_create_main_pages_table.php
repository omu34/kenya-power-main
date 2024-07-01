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
        Schema::create('main_pages', function (Blueprint $table) {
            $table->id();
            // $table->string('main_page_name12')->nullable();
            $table->string('gallery_name')->nullable();
            $table->string('button_text')->nullable();
            $table->string('latest_news')->nullable();
            // $table->string('latest_gallery')->nullable();
            $table->string('latest_videos')->nullable();
            $table->string('featured')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_pages');
    }
};
