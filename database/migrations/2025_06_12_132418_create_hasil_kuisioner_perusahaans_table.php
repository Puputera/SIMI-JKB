<?php

use App\Models\KuisionerPerusahaan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PertanyaanKuisioner;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasil_kuisioner_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KuisionerPerusahaan::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(PertanyaanKuisioner::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_kuisioner_perusahaans');
    }
};
