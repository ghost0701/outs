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
            $table->unsignedBigInteger('merchant_id')->index();
            $table->foreign('merchant_id')->references('id')->on('merchants')->cascadeOnDelete();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('brand_id')->index();
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete();
            $table->unsignedBigInteger('gender_id')->index()->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->nullOnDelete();
            $table->unsignedBigInteger('color_id')->index()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->nullOnDelete();
            $table->unsignedBigInteger('discount_menu_id')->index()->nullable();
            $table->foreign('discount_menu_id')->references('id')->on('menus')->nullOnDelete();
            $table->unsignedBigInteger('popular_menu_id')->index()->nullable();
            $table->foreign('popular_menu_id')->references('id')->on('menus')->nullOnDelete();
            $table->unsignedBigInteger('favorite_menu_id')->index()->nullable();
            $table->foreign('favorite_menu_id')->references('id')->on('menus')->nullOnDelete();
            $table->string('product_code')->index();
            $table->string('group_code')->index();
            $table->string('name');
            $table->string('name_ru')->nullable();
            $table->text('description');
            $table->text('description_ru')->nullable();
            $table->json('images')->nullable();
            $table->unsignedDouble('discount_price')->default(0);
            $table->unsignedDouble('sell_price')->default(0);
            $table->boolean('has_discount')->default(0);
            $table->boolean('has_stock')->default(0);
            $table->unsignedDouble('average_rating')->default(0);
            $table->unsignedInteger('ratings_count')->default(0);
            $table->unsignedInteger('favorites_count')->default(0);
            $table->unsignedInteger('random')->default(0);
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
