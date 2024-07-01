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
        Schema::create('latest_galleries', function (Blueprint $table) {
            $table->id();
            $table->timestamp('day')->useCurrent();
            $table->string('latest_gallery')->nullable();
            $table->string('button_text')->nullable();
            $table->string('main_page_content')->nullable();
            $table->unsignedInteger('views')->default(0);
            $table->text('description');
            $table->unsignedInteger('likes')->default(0);
            $table->string('link')->nullable();
            $table->string('file')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_galleries');
    }
};
