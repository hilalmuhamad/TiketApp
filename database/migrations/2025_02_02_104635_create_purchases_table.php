<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();  // ID pembelian
            $table->bigInteger('user_id')->unsigned();  // ID pengguna yang melakukan pembelian
            $table->bigInteger('event_id')->unsigned();  // ID acara yang dibeli tiketnya
            $table->integer('ticket_quantity');  // Jumlah tiket yang dibeli
            $table->decimal('total_amount', 10, 2);  // Total harga yang dibayar
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');  // Status pembelian
            $table->timestamps();

            // Tambahkan foreign key untuk hubungan dengan tabel events dan users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
