<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('seller_id'); // Foreign key to users table (seller)
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key to categories table
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Product description
            $table->decimal('price', 10, 2); // Price (up to 10 digits, 2 decimal places)
            $table->integer('stock')->default(0); // Product stock (default 0)
            $table->string('image')->nullable(); // Product image (nullable)
            $table->timestamps(); // Created and updated timestamps

            // Add foreign key constraints
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade'); // Cascade delete if user is deleted
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); // Set category to null if deleted
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
