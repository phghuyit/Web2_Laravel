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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->foreignId('author_id')->constrained()->cascadeOnDelete();
            $table->foreignId('categories_id')->constrained()->cascadeOnDelete();

            $table->year('year')->nullable();

            $table->integer('price');

            $table->integer('sale')->default(0);
            $table->boolean('is_on_sale')->default(false);

            $table->integer('sold')->default(0);
            $table->smallInteger('rate')->default(0);

            $table->integer('view')->default(0);

            $table->boolean('status')->default(true);
            $table->boolean('trash')->default(false);

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
