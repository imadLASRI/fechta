<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('manager_id'); // the logedin manager (user)
            $table->string('place_name');
            $table->string('place_city');
            $table->string('place_adresse');
            $table->string('place_phone');
            $table->string('place_types');
            $table->text('place_description');
            $table->string('place_image');
            $table->string('place_website');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
