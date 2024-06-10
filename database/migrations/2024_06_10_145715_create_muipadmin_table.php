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
        Schema::create('muipadmin', function (Blueprint $table) {
            $table->increments('MUIPAdminID');
            $table->string('MUIPAdminName');
            $table->string('MUIPAdminUsername');
            $table->string('MUIPAdminPass');
            $table->string('MUIPAdminAddress');
            $table->integer('MUIPAdminContact');
            $table->string('MUIPAdminEmail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muipadmin');
    }
};
