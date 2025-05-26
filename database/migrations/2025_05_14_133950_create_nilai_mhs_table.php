<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Mahasiswa;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai_mhs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Mahasiswa::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('nilai_perusahaan', 5, 2);
            $table->decimal('nilai_dosen', 5, 2);
            $table->decimal('nilai_akhir', 5, 2);
            $table->string('catatan_perusahaan');
            $table->string('catatan_dosen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_mhs');
    }
};
