<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designer_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('designer_id')->index();
            $table->string('title');
            $table->string('image_url');
            $table->string('banner_url');
            $table->string('locale', 3);
            $table->timestamps();
        });

        Schema::table('designer_translations', function (Blueprint $table) {
            $table->foreign('designer_id')->references('id')->on('designers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('designer_translations', function (Blueprint $table) {
            $table->dropForeign(['designer_id']);
        });
        Schema::dropIfExists('designer_translations');
    }
}
