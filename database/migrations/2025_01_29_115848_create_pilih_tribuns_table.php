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
        Schema::create('pilih_tribuns', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tribun')->nullable(); // contoh: Timur, Barat, Selatan, Utara
            $table->string('tempat_penukaran')->nullable();; // tempat penukaran tiket
            $table->decimal('harga', 10, 2)->nullable();; // harga tiket tribun
            $table->integer('stok')->default(100)->after('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilih_tribuns');
        Schema::table('pilih_tribuns', function (Blueprint $table) {
            $table->dropColumn('stok');
        });
    }
};
