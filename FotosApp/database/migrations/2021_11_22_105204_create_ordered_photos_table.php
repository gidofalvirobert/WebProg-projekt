<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_photos', function (Blueprint $table) {

            $table->timestamps();
            $table->foreignId('rendelesek_fotozas_users_id')->references('fotozas_users_id')->on('orders');
            $table->date('rendelesek_rendDatum')->references('fotozas_rerendDatum')->on('orders');
            $table->date('rendelesek_fotozas_datum')->references('fotozas_datum')->on('orders');
            $table->foreignId('photos_id')->references('id')->on('photos');
            $table->Enum('termek',['vaszon','papir','fa','magnes']);
            $table->Enum('meretek',['6x4','6x9','9x13','10x15','13x18','15x20','20x30','Egyeni']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordered_photos');
    }
}
