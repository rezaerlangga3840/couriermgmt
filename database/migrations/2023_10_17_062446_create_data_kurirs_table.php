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
        Schema::create('data_kurir', function (Blueprint $table) {
            $table->id();
            $table->string('nik_kurir');
            $table->string('nama_kurir');
            $table->string('alamat_kurir');
            $table->string('notel_kurir');
            $table->enum('tingkat_kurir',['1','2','3','4','5'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kurir');
    }
};
