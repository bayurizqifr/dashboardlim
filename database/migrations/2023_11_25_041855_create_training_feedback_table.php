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
        Schema::create('training_feedback', function (Blueprint $table) {
            $table->id();
            $table->enum('bulan_pelaksanaan', ['1','2','3','4','5','6','7','8','9','10','11','12'])->nullable();
            $table->string('tahun_pelaksanaan')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('nama_pelatihan')->nullable();
            $table->date('tgl_mulai_training')->nullable();
            $table->date('tgl_akhir_training')->nullable();
            $table->string('regional_penyelenggara')->nullable();
            $table->string('witel_penyelenggara')->nullable();
            $table->string('feedback_saran')->nullable();
            $table->float('feedback_support_1')->nullable();
            $table->float('feedback_support_2')->nullable();
            $table->float('feedback_support_3')->nullable();
            // $table->float('feedback_support_4')->nullable();
            // $table->float('feedback_support_5')->nullable();
            $table->float('feedback_facilitator_1')->nullable();
            $table->float('feedback_facilitator_2')->nullable();
            $table->float('feedback_facilitator_3')->nullable();
            // $table->float('feedback_facilitator_4')->nullable();
            // $table->float('feedback_facilitator_5')->nullable();
            $table->float('feedback_facilities_1')->nullable();
            $table->float('feedback_facilities_2')->nullable();
            $table->float('feedback_facilities_3')->nullable();
            // $table->float('feedback_facilities_4')->nullable();
            // $table->float('feedback_facilities_5')->nullable();
            $table->float('feedback_manfaat')->nullable();
            $table->float('feedback_antusias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_feedback');
    }
};
