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
        Schema::create('training_evaluations', function (Blueprint $table) {
            $table->id();
            $table->enum('bulan_pelaksanaan', ['1','2','3','4','5','6','7','8','9','10','11','12']);
            $table->string('tahun_pelaksanaan');
            $table->string('regional');
            $table->string('witel');
            $table->string('nik');
            $table->string('nama');
            $table->string('nama_pelatihan');
            $table->date('tgl_mulai_pelaksanaan');
            $table->date('tgl_selesai_pelaksanaan');
            $table->string('nama_instruktur');
            $table->enum('kehadiran', ['hadir', 'tidak hadir']);
            $table->float('nilai_pre_test', 3, 2);
            $table->float('nilai_post_test', 3, 2);
            $table->enum('keterangan', ['deadwood', 'inconsistent', 'continuity learner', 'high profesional learner', 'consistance star']);
            $table->float('peningkatan_belajar', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_evaluations');
    }
};
