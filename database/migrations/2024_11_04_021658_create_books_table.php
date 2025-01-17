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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // プライマリーキー
            $table->string('title', 50);
            $table->string('year_published',4);
            $table->string('cover_photo', 50);
            $table->unsignedBigInteger('author_id')->nullable();
            $table->timestamps(); // created_at, updated_atカラムを自動生成
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
