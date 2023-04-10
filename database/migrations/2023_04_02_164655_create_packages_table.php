<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("senderId")->unsigned();
            $table->bigInteger("receiverId")->unsigned();
            $table->string("name");
            $table->string("packageNumber");
            $table->string("destination");
            $table->boolean("isTaken")->default(false);
            $table->timestamps();
            $table->foreign('senderId')->references('id')->on('senders');
            $table->foreign('receiverId')->references('id')->on('receivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
