<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSatuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_satuan', function (Blueprint $table) {
            $table->id();
            $table->string('name',64);
            $table->integer('level');
            $table->timestamps();
        });

        Schema::create('m_satker', function (Blueprint $table) {
            $table->id();
            $table->string('name',64);
            $table->integer('satuan_id');
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
        Schema::dropIfExists('m_satuan');
        Schema::dropIfExists('m_satker');
    }
}
