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
        Schema::create('show_bulans', function (Blueprint $table) {
            $table->id();
            $table->enum('bulan_pelaksanaan', ['1','2','3','4','5','6','7','8','9','10','11','12'])->nullable();
            $table->string('tahun_pelaksanaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_bulans');
    }
};
