<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peminjaman</title>
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
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(172, 158, 158, 0.3);
            color: black;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: black;
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

        .back-button {
            position: fixed;
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
    <button class="back-button" onclick="window.history.back()">&larr; Kembali</button>
    <div class="container">
        <h1>Edit Data Peminjaman</h1>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pinjaman.update', $data->id_pinjam) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="dipinjam" {{ old('status', $data->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="dikembalikan" {{ old('status', $data->status) == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                </select>
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</body>
</html>
