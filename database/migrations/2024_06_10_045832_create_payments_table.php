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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('paymentID');
            $table->foreignId('billID')->constrained('bills')->onDelete('cascade');
            $table->string('paymentRemark')->nullable();
            $table->decimal('paymentAmount', 8, 2);
            $table->date('paymentDate');
            $table->string('paymentMethod');
            $table->string('paymentStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
