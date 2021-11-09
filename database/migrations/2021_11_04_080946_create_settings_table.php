<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('number')->default('NULL');
            $table->string('address_uz')->default('NULL');
            $table->string('address_en')->default('NULL');
            $table->string('address_ru')->default('NULL');
            $table->string('email')->default('NULL');
            $table->string('name_uz')->default('NULL');
            $table->string('name_en')->default('NULL');
            $table->string('name_ru')->default('NULL');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('settings')->insert(
            array(
                'name_uz' => 'NULL',
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
        Schema::dropIfExists('settings');
    }
}
