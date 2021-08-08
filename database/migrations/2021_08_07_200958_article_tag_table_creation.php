<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticleTagTableCreation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id');
            $table->integer('tag_id');
//            $table->foreignId('category_id')->nullable()->constrained('categories','id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');

    }
}
