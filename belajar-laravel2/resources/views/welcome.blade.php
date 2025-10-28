<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Tiket Wisata</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            /* Gradient sesuai screenshot */
            background: linear-gradient(120deg, #00b894, #00cec9);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-weight: 300;
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            padding-bottom: 10px;
            display: inline-block;
        }
        p {
            font-size: 1.1em;
        }
        .btn-list {
            list-style: none;
            padding: 0;
            margin-top: 25px;
        }
        .btn-list li {
            margin-bottom: 15px;
        }
        .btn-list a {
            display: block;
            background-color: #ffffff;
            color: #00b894; /* Warna teks sesuai gradient */
            padding: 15px 25px;
            border-radius: 50px; /* Tombol bulat */
            text-decoration: none;
            font-weight: bold;
            font-size: 1em;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-list a:hover {
            background-color: #f1f1f1;
            transform: translateY(-2px);
        }
        footer {
            margin-top: 30px;
            font-size: 0.9em;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Sistem Tiket Wisata</h1>
        <p>Silakan pilih destinasi wisata untuk melihat harga tiket:</p>
        
        <ul class="btn-list">
            <li><a href="/tiket/Papuma/20000">Tiket Papuma (Rp 20.000)</a></li>
            <li><a href="/tiket/WatuUlo/15000">Tiket Watu Ulo (Rp 15.000)</a></li>
            <li><a href="/tiket/PancerPuger/10000">Tiket Pancer Puger (Rp 10.000)</a></li>
        </ul>

        <footer>© 2025 Sistem Tiket Wisata - Laravel Route Demo</footer>
    </div>
</body>
</html>