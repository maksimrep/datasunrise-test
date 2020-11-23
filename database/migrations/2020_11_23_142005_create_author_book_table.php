<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();

        Schema::create('author_book', function (Blueprint $table) {
            $table->unsignedInteger('book_id')->nullable();
            $table->unsignedInteger('author_id')->nullable();
            $table->timestamps();
        });

        Schema::table('author_book', function(Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');//->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('author_id')->references('id')->on('authors');//->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_book');
    }
}
