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
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('billID');
            $table->integer('studentID')->unsigned();
            $table->foreign('studentID')->references('StudentID')->on('student');
            $table->string('billDescription');
            $table->float('billAmount');
            $table->dateTime('billDueDate');
            $table->string('billStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill');
    }
};
