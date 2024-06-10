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
        Schema::create('studentresult', function (Blueprint $table) {
            $table->increments('SlipNumber');
            $table->char('Grade');
            $table->integer('StudentID')->unsigned();
            $table->foreign('StudentID')->references('StudentID')->on('student');
            $table->string('SubjectCode');
            $table->foreign('SubjectCode')->references('SubjectCode')->on('subject');
            $table->integer('RegistrationNumber')->unsigned();
            $table->foreign('RegistrationNumber')->references('RegistrationNumber')->on('examregistration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentresult');
    }
};
