<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("category_id")->constrained();
            $table->string("name_kaz");
            $table->string("name_rus");
            $table->string("name_eng");
            $table->double('lat');
            $table->double('lng');
            $table->string("adress_kaz");
            $table->string("adress_rus");
            $table->string("adress_eng");
            $table->string("contact_kaz");
            $table->string("contact_rus");
            $table->string("contact_eng");
            $table->string("desc_kaz");
            $table->string("desc_rus");
            $table->string("desc_eng");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
