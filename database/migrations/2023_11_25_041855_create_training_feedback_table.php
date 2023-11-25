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
            $table->enum('bulan_pelaksanaan', ['1','2','3','4','5','6','7','8','9','10','11','12']);
            $table->string('tahun_pelaksanaan');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('nama_perusahaan');
            $table->string('nama_pelatihan');
            $table->date('tgl_mulai_training');
            $table->date('tgl_akhir_training');
            $table->string('regional_penyelenggara');
            $table->string('witel_penyelenggara');
            $table->string('feedback_saran');
            $table->integer('feedback_support_1');
            $table->integer('feedback_support_2');
            $table->integer('feedback_support_3');
            // $table->integer('feedback_support_4');
            // $table->integer('feedback_support_5');
            $table->integer('feedback_facilitator_1');
            $table->integer('feedback_facilitator_2');
            $table->integer('feedback_facilitator_3');
            // $table->integer('feedback_facilitator_4');
            // $table->integer('feedback_facilitator_5');
            $table->integer('feedback_facilities_1');
            $table->integer('feedback_facilities_2');
            $table->integer('feedback_facilities_3');
            // $table->integer('feedback_facilities_4');
            // $table->integer('feedback_facilities_5');
            $table->integer('feedback_manfaat');
            $table->integer('feedback_antusias');
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
