<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 50%;
            padding: 10px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(172, 158, 158, 0.3);
        }

        h1 {
            font-size: 2rem;
            text-align: center;
            color: rgb(0, 0, 0);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: black;
        }

        select, input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 2px solid #444;
            background-color: #fff;
            border-radius: 5px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        select:focus, input:focus {
            border-color: #c6ff00;
            outline: none;
            box-shadow: 0 0 10px #c6ff00;
        }

        .btn {
            background-color: #c6ff00;
            color: #222;
            padding: 12px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }

        .btn:hover {
            background-color: #aaff00;
            transform: scale(1.05);
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .container {
                width: 80%;
            }
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: bold;
            color: #c6ff00;
            cursor: pointer;
            transition: 0.3s;
        }

        .back-button:hover {
            color: #aaff00;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="window.history.back()">← Kembali</button>
    <div class="container">
    <h1>Tambah Data Pinjaman</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        
        <form action="{{ url('/tambahpinjaman') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nisn">Siswa</label>
                <select name="nisn" id="nisn" required>
                    <option value="" disabled selected>Pilih Siswa</option>
                    @foreach($siswa as $user)
                        <option value="{{ $user->nisn }}">{{ $user->nama_siswa }} - {{ $user->nisn }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_barang">Barang</label>
                <select name="id_barang" id="id_barang" required>
                    <option value="" disabled selected>Pilih Barang</option>
                    @foreach($barang as $item)
                        <option value="{{ $item->id_barang }}">{{ $item->nama_barang }} - {{ $item->id_barang }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required>
            </div>

            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="dipinjam">Dipinjam</option>
                    <option value="dikembalikan">Dikembalikan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_pinjam">Jumlah Pinjam</label>
                <input type="number" name="jumlah_pinjam" id="jumlah_pinjam" min="1" required>
            </div>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</body>
</html>