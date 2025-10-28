<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Tiket Wisata</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5; /* Latar belakang abu-abu muda */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 35px 40px;
            width: 450px;
            text-align: left;
        }
        .card h2 {
            font-size: 1.8em;
            color: #333;
            margin-top: 0;
            margin-bottom: 30px;
            text-align: center;
        }
        .info-item {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 15px;
        }
        .info-item strong {
            font-weight: 600;
            color: #111;
        }
        /* Memberi warna hijau pada harga, seperti di screenshot */
        .price {
            color: #28a745; 
            font-size: 1.3em;
            font-weight: bold;
        }
        .btn-kembali {
            display: block;
            width: 100%;
            background-color: #0d6efd; /* Biru */
            color: #ffffff;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1em;
            text-align: center;
            margin-top: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box; /* Agar padding tidak merusak lebar */
        }
        .btn-kembali:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Informasi Tiket Wisata</h2>
        
        <div class="info-item">
            Tempat Wisata: <strong>{{ $tempat_wisata }}</strong>
        </div>
        
        <div class="info-item">
            Harga Tiket: 
            <strong class="price">
                Rp {{ number_format($harga_tiket, 0, ',', '.') }}
            </strong>
        </div>

        <a href="/" class="btn-kembali">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>