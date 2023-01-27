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
        Schema::create('lights', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bridge');
            $table->text('label');
            $table->bigInteger('hue_id');
            $table->text('hue_type');
            $table->text('hue_name');
            $table->text('hue_modelid');
            $table->text('hue_manufacturername');
            $table->text('hue_productname');
            $table->text('hue_uniqueid');
            $table->text('hue_swversion');
            $table->text('hue_swconfigid');
            $table->text('hue_productid');
            $table->timestamps();
        });

        Schema::create('light_states', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_light');
            $table->integer('on');
            $table->integer('brightness');
            $table->integer('hue');
            $table->integer('saturation');
            $table->text('effect');
            $table->double('x');
            $table->double('y');
            $table->integer('temperature');
            $table->text('alert');
            $table->text('colormode');
            $table->text('mode');
            $table->integer('reachable');
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bridge');
            $table->text('label');
            $table->bigInteger('hue_id');
            $table->text('hue_type');
            $table->text('hue_name');
            $table->text('hue_class');
            $table->timestamps();
        });

        Schema::create('lights_rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_light');
            $table->bigInteger('id_room');
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
        Schema::dropIfExists('lights');
        Schema::dropIfExists('light_states');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('lights_rooms');
    }
};
