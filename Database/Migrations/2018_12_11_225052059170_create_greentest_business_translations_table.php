<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGreentestbusinessTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greentest__business_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->string('title');
            $table->string('slug');
            $table->text('summary');
            $table->text('description');
            $table->string('extra');

            $table->integer('business_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['business_id', 'locale']);
            $table->foreign('business_id')->references('id')->on('greentest__businesses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('greentest__business_translations', function (Blueprint $table) {
            $table->dropForeign(['business_id']);
        });
        Schema::dropIfExists('greentest__business_translations');
    }
}
