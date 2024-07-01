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
        Schema::create('featured_news', function (Blueprint $table) {
            $table->id();
            $table->string('featured')->nullable();
            $table->string('featured_content')->nullable();
            $table->string('button_text')->nullable();
            $table->timestamp('day')->useCurrent();
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
        Schema::dropIfExists('featured_news');
    }
};
