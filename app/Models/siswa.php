<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    public $timestamps = false;

    
    protected $fillable = ['nisn', 'nama_siswa', 'kelas'];

    public function peminjaman()
    {
        return $this->hasMany(Pinjaman::class, 'nisn', 'nisn');
    }
}
