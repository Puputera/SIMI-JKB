<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Magang;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai_mhs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Magang::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('total_nilai_perusahaan', 5, 2)->nullable();
            $table->decimal('rata_nilai_perusahaan', 5, 2)->nullable();
            $table->decimal('total_nilai_dosen', 5, 2)->nullable();
            $table->decimal('rata_nilai_dosen', 5, 2)->nullable();
            $table->decimal('total_nilai_akhir', 5, 2)->nullable();
            $table->decimal('rata_nilai_akhir', 5, 2)->nullable();
            $table->string('catatan_perusahaan')->nullable();
            $table->string('catatan_dosen')->nullable();
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
