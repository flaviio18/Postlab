<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('article_tag', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('article_id');
        $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

        $table->unsignedBigInteger('tag_id');
        $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });
}
    /**
     * Run the migrations.
     */
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_tag');
    }
};





