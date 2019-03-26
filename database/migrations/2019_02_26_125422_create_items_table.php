<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('style_id');
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('designer_id')->nullable();
            $table->unsignedInteger('sex_id')->nullable();
            $table->string('model_name');
            $table->double('price');
            $table->boolean('is_sale')->default(0);
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('designer_id')->references('id')->on('designers')->onDelete('cascade');
            $table->foreign('sex_id')->references('id')->on('sexes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['designer_id']);
            $table->dropForeign(['sex_id']);
        });
        Schema::dropIfExists('items');
    }
}
