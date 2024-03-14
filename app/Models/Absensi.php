<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [

        'kelas_id',
        'materi_id',
        'user_id',
        'user_id_asisten',
        'teaching_role',
        'date',
        'start',
        'end',
        'duration'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function code()
    {
        return $this->belongsTo(Code::class, 'code_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
}
