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
        Schema::create('bills', function (Blueprint $table) {
            $table->id('billID');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('billDescription');
            $table->decimal('billAmount', 8, 2);
            $table->date('billDueDate')->nullable();
            $table->string('billStatus')->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
