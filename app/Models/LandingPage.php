<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'universitas',
        'jalur_program',
        'no_kip',
        'file_kip',
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ibu_kandung',
        'kewarganegaraan',
        'nik',
        'file_ijazah',
        'no_ijazah',
        'file_transkrip',
        'file_foto',
        'fakultas',
        'program_studi',
        'no_hp',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}