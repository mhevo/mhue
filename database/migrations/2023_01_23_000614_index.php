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
        Schema::table('lights', function (Blueprint $table) {
            $table->index('id_bridge');
            $table->index('hue_id');
        });

        Schema::table('lights_rooms', function (Blueprint $table) {
            $table->index('id_light');
            $table->index('id_room');
        });

        Schema::table('light_states', function (Blueprint $table) {
            $table->index('id_light');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->index('id_bridge');
            $table->index('hue_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lights', function (Blueprint $table) {
            $table->dropIndex('id_bridge');
            $table->dropIndex('hue_id');
        });

        Schema::table('lights_rooms', function (Blueprint $table) {
            $table->dropIndex('id_light');
            $table->dropIndex('id_room');
        });

        Schema::table('light_states', function (Blueprint $table) {
            $table->dropIndex('id_light');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropIndex('id_bridge');
            $table->dropIndex('hue_id');
        });
    }
};
