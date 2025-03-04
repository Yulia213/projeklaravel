<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        /* Global Styles */
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
            width: 40%;
            padding: 20px;
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

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 2px solid #444;
            background-color: #fff;
            color: black;
            border-radius: 5px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #c6ff00;
            outline: none;
            box-shadow: 0 0 10px #c6ff00;
        }

        button[type="submit"] {
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

        button[type="submit"]:hover {
            background-color: #aaff00;
            transform: scale(1.05);
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
        <h1>Tambah Siswa</h1>
        <form action="{{ url('/tambahsiswa') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" id="nisn" required>
            </div>
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" name="nama_siswa" id="nama_siswa" required>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" required>
            </div>
            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
