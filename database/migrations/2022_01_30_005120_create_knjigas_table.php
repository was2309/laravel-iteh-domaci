<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnjigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knjigas', function (Blueprint $table) {
            $table->id();
            $table->string('naslov');
            $table->string('izdavac');
            $table->string('ISBN');
            $table->foreignId('pisac_id');
            $table->foreignId('user_id');
            $table->foreignId('kategorija_id');
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
        Schema::dropIfExists('knjigas');
    }
}
