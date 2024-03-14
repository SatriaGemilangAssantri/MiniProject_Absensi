<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';

    protected $fillable = [
        'materi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
