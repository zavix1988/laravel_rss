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
        Schema::create('posts_categories', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->primary(['category_id', 'post_id']);

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_categories');
    }
};
