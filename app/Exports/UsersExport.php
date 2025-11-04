<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::select(
            'nama_lengkap',
            'nisn',
            'tempat_lahir',
            'tanggal_lahir',
            'nama_ibu_kandung',
            'kewarganegaraan',
            'nik',
            'jalur_program',
            'no_kip',
            'file_kip',
            'universitas',
            'fakultas',
            'program_studi',
            'file_ijazah',
            'no_ijazah',
            'file_transkrip',
            'file_foto',
            'no_hp',
            'email'
        )->get();
    }

    public function headings(): array
    {
        return [
            'nama_lengkap',
            'nisn',
            'tempat_lahir',
            'tanggal_lahir',
            'nama_ibu_kandung',
            'kewarganegaraan',
            'nik',
            'jalur_program',
            'no_kip',
            'file_kip',
            'universitas',
            'fakultas',
            'program_studi',
            'file_ijazah',
            'no_ijazah',
            'file_transkrip',
            'file_foto',
            'no_hp',
            'email'
        ];
    }
}