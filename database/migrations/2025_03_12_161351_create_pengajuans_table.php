<?php

use App\Models\Mahasiswa;
use App\Models\Perusahaan;
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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Mahasiswa::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Perusahaan::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('tertuju', 50);
            $table->string('contact_person', 15);
            $table->string('no_hpcp', 15);
            $table->date('mulai');
            $table->date('selesai');
            $table->text('deskripsi');
            $table->boolean('status')->nullable();
            $table->string('alasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
