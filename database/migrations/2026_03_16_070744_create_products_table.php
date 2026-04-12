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
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');

            $table->string('name',1000);
            $table->string('slug',1000);

            $table->float('price_buy');
            $table->float('price_sale')->nullable();
            $table->unsignedTinyInteger('is_sale')->default(0);

            $table->string('image',1000)->nullable();

            $table->unsignedInteger('qty');

            $table->mediumText('detail')->nullable();

            $table->text('description')->nullable();

            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();

            $table->unsignedTinyInteger('status')->default(2);

            $table->unsignedInteger('views')->default(0);

            $table->timestamps();
            $table->softDeletes();
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
