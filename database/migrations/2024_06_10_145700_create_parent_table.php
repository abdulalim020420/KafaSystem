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
        Schema::create('parent', function (Blueprint $table) {
            $table->increments('ParentID');
            $table->string('ParentName');
            $table->string('ParentUsername');
            $table->string('ParentPass');
            $table->string('ParentAddress');
            $table->integer('ParentContact');
            $table->string('ParentEmail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent');
    }
};
