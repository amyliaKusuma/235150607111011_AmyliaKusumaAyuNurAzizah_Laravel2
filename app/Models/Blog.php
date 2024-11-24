<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    // Field yang bisa diisi secara massal
    protected $fillable = [
        'judul', 
        'isi', 
        'pembuat',
        'foto'
    ];

    // Field yang akan diubah menjadi Carbon instance (tanggal)
    protected $dates = [
        'created_at', 
        'updated_at'
    ];
}