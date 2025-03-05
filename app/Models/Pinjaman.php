<?php

namespace App\Models; // Menambahkan namespace yang benar

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';
    public $timestamps = false;

    
    protected $primaryKey = 'id_pinjam';

    
    protected $fillable = ['id_pinjam', 'id_barang', 'nisn', 'tanggal_pinjam', 'tanggal_kembali', 'status', 'jumlah_pinjam'];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}
