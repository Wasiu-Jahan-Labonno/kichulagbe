<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                               // Name of the card (Product name)
            $table->text('description');                                          // Description of the product
            $table->decimal('price', 10, 2);                                      // Price of the card (Product price)
            $table->string('image')->nullable();                                  // Product image (optional)
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key to categories
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
}

