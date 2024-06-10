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
        Schema::create('kafaadmin', function (Blueprint $table) {
            $table->increments('KAFAAdminID');
            $table->string('KAFAAdminName');
            $table->string('KAFAAdminUsername');
            $table->string('KAFAAdminPass');
            $table->string('KAFAAdminAddress');
            $table->integer('KAFAAdminContact');
            $table->string('KAFAAdminEmail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kafaadmin');
    }
};
