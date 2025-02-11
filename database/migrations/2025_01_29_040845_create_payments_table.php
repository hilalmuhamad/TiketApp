<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Menambahkan kolom tribun_id dan relasi foreign key
            $table->unsignedBigInteger('tribun_id')->nullable();
            $table->foreign('tribun_id')->references('id')->on('pilih_tribuns')->onDelete('cascade');
            
            // Kolom-kolom lainnya tetap ada
            $table->string('email')->nullable();
            $table->string('phone')->default('default_phone_number'); // Menambahkan nilai default pada kolom phone


            $table->integer('quantity')->default(1);
            $table->bigInteger('amount')->default(0);
            $table->string('payment_method');
            $table->text('payment_details')->nullable();
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending'); // Changed 'success' to 'paid'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
