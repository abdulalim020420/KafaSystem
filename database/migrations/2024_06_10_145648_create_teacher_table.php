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
        Schema::create('teacher', function (Blueprint $table) {
            $table->increments('TeacherID');
            $table->string('TeacherName');
            $table->string('TeacherUsername');
            $table->string('TeacherPass');
            $table->string('TeacherAddress');
            $table->integer('TeacherContact');
            $table->string('TeacherEmail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher');
    }
};
