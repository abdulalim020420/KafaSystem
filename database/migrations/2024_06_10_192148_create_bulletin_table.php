<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bulletin', function (Blueprint $table) {
            $table->increments('bulletinID');
            $table->string('bulletinTitle');
            $table->string('bulletinDescription');
            $table->binary('bulletinPic');
            $table->date('bulletinDate');
            $table->integer('KAFAAdminID')->unsigned();
            $table->foreign('KAFAAdminID')->references('KAFAAdminID')->on('kafaadmin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulletin');
    }
};
