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
        Schema::create('report', function (Blueprint $table) {
            $table->increments('ReportID');
            $table->string('ReportName');
            $table->string('ReportDescription');
            $table->integer('TeacherID')->unsigned();
            $table->foreign('TeacherID')->references('TeacherID')->on('teacher');
            $table->integer('ParentID')->unsigned();
            $table->foreign('ParentID')->references('ParentID')->on('parent');
            $table->integer('bulletinID')->unsigned();
            $table->foreign('bulletinID')->references('bulletinID')->on('bulletin');
            $table->integer('SlipNumber')->unsigned();
            $table->foreign('SlipNumber')->references('SlipNumber')->on('studentresult');
            $table->integer('RegistrationNumber')->unsigned();
            $table->foreign('RegistrationNumber')->references('RegistrationNumber')->on('examregistration');
            $table->string('SubjectCode');
            $table->foreign('SubjectCode')->references('SubjectCode')->on('subject');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
