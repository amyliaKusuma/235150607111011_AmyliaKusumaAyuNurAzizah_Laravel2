<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('judul'); // Kolom judul artikel
            $table->string('pembuat'); // Kolom judul artikel
            $table->text('isi'); // Kolom isi artikel
            $table->string('foto')->nullable(); // Kolom foto (opsional)
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('blogs'); // Hapus tabel blogs
    }
}
