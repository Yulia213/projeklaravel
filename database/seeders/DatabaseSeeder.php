<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barang')->insert([
            ['id_barang' => 1, 'nama_barang' => 'Laptop Dell Inspiron', 'jenis_barang' => 'Laptop', 'stok' => 10],
            ['id_barang' => 2, 'nama_barang' => 'Keyboard Logitech', 'jenis_barang' => 'Peralatan Komputer', 'stok' => 27],
            ['id_barang' => 3, 'nama_barang' => 'Mouse Wireless', 'jenis_barang' => 'Peralatan Komputer', 'stok' => 30],
            ['id_barang' => 4, 'nama_barang' => 'Proyektor Epson', 'jenis_barang' => 'Peralatan Presentasi', 'stok' => 5],
            ['id_barang' => 6, 'nama_barang' => 'Router Cisco', 'jenis_barang' => 'Peralatan Jaringan', 'stok' => 8],
            ['id_barang' => 15, 'nama_barang' => 'Laptop Lenovo Thinkpad', 'jenis_barang' => 'Laptop', 'stok' => 4],
            ['id_barang' => 16, 'nama_barang' => 'Terminal', 'jenis_barang' => 'Elektronik', 'stok' => 9],
        ]);

        DB::table('siswa')->insert([
            ['nisn' => '1234567844', 'nama_siswa' => 'Mahendra Adhiwidjaya', 'kelas' => 'XI RPL B'],
            ['nisn' => '1234567876', 'nama_siswa' => 'Respati Adiningrat', 'kelas' => 'X RPL A'],
            ['nisn' => '1234567882', 'nama_siswa' => 'Aresatya Malik', 'kelas' => 'X RPL B'],
            ['nisn' => '1234567890', 'nama_siswa' => 'Cantika Anggraini', 'kelas' => 'XI RPL B'],
            ['nisn' => '1234567891', 'nama_siswa' => 'Radian Mahendra', 'kelas' => 'X RPL A'],
            ['nisn' => '1234567892', 'nama_siswa' => 'Gista Arum', 'kelas' => 'X RPL A'],
            ['nisn' => '1234567893', 'nama_siswa' => 'Januartha Elvano', 'kelas' => 'XI RPL A'],
            ['nisn' => '1234567894', 'nama_siswa' => 'Malik Hadian Putra', 'kelas' => 'X RPL B'],
            ['nisn' => '1234567895', 'nama_siswa' => 'Mahardika Sena', 'kelas' => 'XII RPL A'],
            ['nisn' => '1234567896', 'nama_siswa' => 'Dhirgantara Yovan', 'kelas' => 'XII RPL B'],
            ['nisn' => '1234567897', 'nama_siswa' => 'Elvano Rakha', 'kelas' => 'X RPL A'],
            ['nisn' => '1234567898', 'nama_siswa' => 'Zayandra Fathir', 'kelas' => 'X RPL B'],
            ['nisn' => '1234567899', 'nama_siswa' => 'Farisandra Kei', 'kelas' => 'XI RPL A'],
            ['nisn' => '1234567901', 'nama_siswa' => 'Adelisa Mahira', 'kelas' => 'X RPL A'],
            ['nisn' => '1234567902', 'nama_siswa' => 'Rania Callista', 'kelas' => 'X RPL B'],
            ['nisn' => '1234567903', 'nama_siswa' => 'Nayandra Elvina', 'kelas' => 'XI RPL A'],
            ['nisn' => '1234567904', 'nama_siswa' => 'Salsabila Aruna', 'kelas' => 'XI RPL B'],
            ['nisn' => '1234567905', 'nama_siswa' => 'Maheswari Ayla', 'kelas' => 'XII RPL A'],
            ['nisn' => '1234567906', 'nama_siswa' => 'Celestia Raveena', 'kelas' => 'XII RPL B'],
            ['nisn' => '1234567907', 'nama_siswa' => 'Keira Nathania', 'kelas' => 'X RPL A'],
            ['nisn' => '1234567909', 'nama_siswa' => 'Felicia Azarine', 'kelas' => 'XI RPL A'],
            ['nisn' => '1234567910', 'nama_siswa' => 'Reynatta Aluna', 'kelas' => 'XI RPL B'],
            ['nisn' => '1234567980', 'nama_siswa' => 'Raynanda Aksara', 'kelas' => 'XI RPL B'],
        ]);

        DB::table('pinjaman')->insert([
            ['id_pinjam' => 1, 'id_barang' => 2, 'nisn' => '1234567892', 'tanggal_pinjam' => '2025-01-08', 'tanggal_kembali' => '2025-01-31', 'status' => 'dikembalikan', 'jumlah_pinjam' => 2],
            ['id_pinjam' => 2, 'id_barang' => 4, 'nisn' => '1234567892', 'tanggal_pinjam' => '2025-01-29', 'tanggal_kembali' => '2025-01-30', 'status' => 'dikembalikan', 'jumlah_pinjam' => 1],
            ['id_pinjam' => 3, 'id_barang' => 2, 'nisn' => '1234567890', 'tanggal_pinjam' => '2025-01-29', 'tanggal_kembali' => '2025-01-31', 'status' => 'dikembalikan', 'jumlah_pinjam' => 2],
            ['id_pinjam' => 4, 'id_barang' => 1, 'nisn' => '1234567894', 'tanggal_pinjam' => '2025-02-10', 'tanggal_kembali' => '2025-02-11', 'status' => 'dikembalikan', 'jumlah_pinjam' => 1],
            ['id_pinjam' => 10, 'id_barang' => 16, 'nisn' => '1234567876', 'tanggal_pinjam' => '2025-02-23', 'tanggal_kembali' => '2025-02-24', 'status' => 'dikembalikan', 'jumlah_pinjam' => 1],
            ['id_pinjam' => 11, 'id_barang' => 15, 'nisn' => '1234567876', 'tanggal_pinjam' => '2025-02-23', 'tanggal_kembali' => '2025-02-27', 'status' => 'dikembalikan', 'jumlah_pinjam' => 4],
            ['id_pinjam' => 12, 'id_barang' => 16, 'nisn' => '1234567903', 'tanggal_pinjam' => '2025-02-24', 'tanggal_kembali' => '2025-02-25', 'status' => 'dikembalikan', 'jumlah_pinjam' => 1],
        ]);
    }
}
