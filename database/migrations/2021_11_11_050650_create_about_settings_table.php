<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAboutSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz')->default('NULL');
            $table->string('title_en')->default('NULL');
            $table->string('title_ru')->default('NULL');
            $table->string('image')->default('null');
            $table->longText('body_uz');
            $table->longText('body_en');
            $table->longText('body_ru');
            $table->longText('youtube');
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('about_settings')->insert(
            array(
                'title_uz' => 'NULL',
                'title_en' => 'NULL',
                'title_ru' => 'NULL',
                'body_uz' => 'NULL',
                'body_en' => 'NULL',
                'body_ru' => 'NULL',
                'youtube' => 'NULL',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_settings');
    }
}
