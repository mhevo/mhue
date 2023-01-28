<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bridges', function (Blueprint $table) {
            $table->id();
            $table->text('ip');
            $table->text('username');
            $table->text('label');
            $table->timestamps();
        });

        DB::table('bridges')->insert(
            array(
                'ip' => '0.0.0.0',
                'username' => 'mhevo',
                'label' => 'mhuebridge',
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
        Schema::dropIfExists('bridges');
    }
};
