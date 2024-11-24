<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePembuatColumnInBlogsTable2 extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['pembuat']);  // Hapus foreign key jika ada
            $table->string('pembuat')->change(); // Ubah tipe data kolom pembuat menjadi string
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('pembuat')->change(); // Kembalikan tipe data
            $table->foreign('pembuat')->references('id')->on('users')->onDelete('cascade'); // Tambahkan foreign key jika diperlukan
        });
    }
}
