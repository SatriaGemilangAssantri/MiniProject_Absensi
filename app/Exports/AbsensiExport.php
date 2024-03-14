<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Absensi::with('kelas', 'materi', 'user', 'code')->get();
    }
    public function map($absensi): array
    {
        return [
            $absensi->id_asisten,
            $absensi->user->name,
            $absensi->kelas->nama_kelas,
            $absensi->materi->materi,
            $absensi->teaching_role,
            $absensi->date,
            $absensi->start,
            $absensi->end,
            $absensi->duration,

        ];
    }
    public function headings(): array
    {
        return [
            'ID Asisten',
            'Nama Asisten',
            'Kelas',
            'Materi',
            'Jaga Sebagai',
            'Tanggal',
            'Waktu Mulai',
            'Waktu Akhir',
            'Durasi',
        ];
    }
}
