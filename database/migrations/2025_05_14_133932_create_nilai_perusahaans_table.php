<?php

use App\Models\Mahasiswa;
use App\Models\NilaiMhs;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Perusahaan;
use App\Models\PertanyaanNilai;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai_Perusahaans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NilaiMhs::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(PertanyaanNilai::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('nilai', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_perusahaans');
    }
};
