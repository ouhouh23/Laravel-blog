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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('title');
            $table->text('body');
            $table->text('piece');
            $table->text('status');
//            $table->enum('status', ['draft', 'unpublished']);
            $table->string('thumbnail')->nullable();
            $table->integer('views')->default(0);
            $table->foreignId('category_id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
