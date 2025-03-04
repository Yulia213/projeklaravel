<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: white;
            display: flex;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100%;
            background-color: #1b1b1b;
            padding-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .sidebar h5 {
            color: #c6ff00;
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.2em;
        }

        .sidebar a {
            display: block;
            color: white;
            background-color: #282828;
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .sidebar a:hover {
            background-color: #c6ff00;
            color: black;
        }

        .header {
            position: fixed;
            top: 0;
            left: 220px;
            width: calc(100% - 220px);
            background-color: #222;
            color: #c6ff00;
            padding: 15px;
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .main-content {
            margin-left: 220px;
            margin-top: 80px;
            padding: 20px;
            width: calc(100% - 220px);
            text-align: left;
        }

        h1 {
            font-size: 2rem;
            color:rgb(255, 255, 255);
            font-weight: bold;
        }

        .search-container {
            display: flex;
            justify-content: left;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-container input {
            width: 300px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            margin-right: 10px;
        }

        .search-container button {
            padding: 10px 15px;
            border: none;
            background-color: #c6ff00;
            color: black;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #b2ff00;
        }

        .add-btn {
            background-color: #c6ff00;
            color: black;
            padding: 12px 20px;
            font-size: 1.2em;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            display: inline-block;
        }

        .add-btn:hover {
            background-color: #b2ff00;
        }

        .print-btn {
            margin-top: 20px;
            padding: 12px 20px;
            font-size: 1.2em;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            display: inline-block;
            background-color: #c6ff00;
            color: black;
            border: none;
            cursor: pointer;
        }

        .print-btn:hover {
            background-color: #b2ff00;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color:rgb(255, 255, 255);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            color: black;
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #c6ff00;
        }

        th {
            background-color: #282828;
            color:rgb(255, 255, 254);
        }

        tr:hover {
            background-color:rgb(204, 204, 204) ;
        }

        .edit-btn, .delete-btn {
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .edit-btn {
            background-color: #ffc107;
            color: black;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
        @media print {
            .sidebar, .header, .search-container, .add-btn, .print-btn {
                display: none;
            }
            .main-content {
                margin: 0;
                width: 100%;
            }

            .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeOut 3s forwards 2s;
            z-index: 1000;
        }
    }
    </style>
</head>
<body>

    <div class="sidebar">
        <h5>Menu</h5>
        <a href="/index">Beranda</a>
        <a href="/barang">Data Barang</a>
        <a href="/siswa">Data Siswa</a>
        <a href="/pinjaman">Data Peminjaman</a>
    </div>

    <div class="header">INVENTORY BARANG RPL</div>

    <div class="main-content">
        <h1>Daftar Peminjaman</h1>
        <br>

        @if(session('success'))
    <div class="notification">
        {{ session('success') }}
    </div>
@endif

        <div class="search-container">
            <form action="{{ route('pinjaman.index') }}" method="GET">
                <input type="text" name="search" placeholder="Cari Data..." value="{{ request('search') }}">
                <button type="submit">Cari</button>
            </form>
        </div>
        
        <a href="{{ url('/tambahpinjaman') }}" class="add-btn">+ Tambah Peminjaman</a>
        <button class="print-btn" onclick="printTable()">Print Data</button>

        <table>
            <thead>
                <tr>
                    <th>Id Pinjam</th>
                    <th>Id Barang</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Jumlah Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pinjaman as $item)
            <tr>
                <td>{{ $item->id_pinjam }}</td>
                <td>{{ $item->id_barang }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->siswa->nama_siswa ?? 'Tidak Ditemukan' }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->jumlah_pinjam }}</td>
                <td style="text-align: center;">
                    <a href="{{ route('pinjaman.edit', $item->id_pinjam) }}" class="edit-btn">Edit</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function printTable() {
            const table = document.querySelector("table");
            const clonedTable = table.cloneNode(true); 
            const rows = clonedTable.rows;

            if (rows[0].cells.length > 0) {
                rows[0].deleteCell(-1); 
            }

            for (let i = 1; i < rows.length; i++) {
                rows[i].deleteCell(-1);
            }

            const printTitle = document.createElement("h2");
            printTitle.style.textAlign = "center";
            printTitle.style.marginBottom = "20px";

            const printArea = document.createElement("div");
            printArea.appendChild(printTitle);
            printArea.appendChild(clonedTable);

            const originalContents = document.body.innerHTML;

            document.body.innerHTML = printArea.outerHTML;

            window.print();

            document.body.innerHTML = originalContents;
            location.reload(); 
        }
    </script>
</body>
</html>