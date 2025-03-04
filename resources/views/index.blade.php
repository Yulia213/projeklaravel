<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            max-width: 1200px;
            padding: 20px;
        }

        .text-section {
            max-width: 50%;
        }

        .text-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .highlight {
            color: #c6ff00;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-custom {
            background-color: #c6ff00;
            color: black;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .btn-custom:hover {
            background-color: #b2ff00;
            color: black;
        }

        .image-section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 10px;
            align-items: center;
        }

        .image-box {
            border-radius: 15px;
            overflow: hidden;
        }

        .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img1 {
            grid-column: 1;
            grid-row: 1 / span 2;
            width: 160px;
            height: 300px;
        }

        .img2 {
            grid-column: 2;
            grid-row: 1;
            width: 160px;
            height: 150px;
        }

        .img3 {
            grid-column: 2;
            grid-row: 2;
            width: 160px;
            height: 150px;
        }

    </style>
</head>
<body>

    <div class="container">
        
        <div class="text-section">
            <h4>Selamat Datang di Web Inventory Barang Jurusan RPL</h4>
            <h1>Kelola data <span class="highlight">dengan mudah</span> 🚀</h1>
            <p>Web ini digunakan untuk mengelola data barang yang tersedia di jurusan RPL secara efisien dan mudah.</p>
            <div class="btn-group">
                <a href="/barang" class="btn-custom">Lihat Data →</a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn-custom">Logout</button>
    </form>
            </div>
        </div>

        <div class="image-section">
            <div class="image-box img1">
                <img src="https://i.pinimg.com/236x/83/77/db/8377dbab8629b2b9177a537f9ba115eb.jpg" alt="Image 1">
            </div>
            <div class="image-box img2">
                <img src="https://i.pinimg.com/474x/8d/e6/9f/8de69fe30fee3c28f606ccdaca977eda.jpg" alt="Image 2">
            </div>
            <div class="image-box img3">
                <img src="https://i.pinimg.com/236x/6c/74/ca/6c74cacebc0145a9dab2fc627117933d.jpg" alt="Image 3">
            </div>
        </div>
    </div>

</body>
</html>
