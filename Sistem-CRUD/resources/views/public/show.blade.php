<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>{{ $car->title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
  <div class="container py-5">
    <a href="/" class="btn btn-secondary mb-3">← Kembali</a>
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('storage/'.$car->main_image) }}" class="img-fluid rounded">
      </div>
      <div class="col-md-6">
        <h2>{{ $car->title }}</h2>
        <p>{{ $car->description }}</p>
        <h4>Rp {{ number_format($car->price,0,',','.') }}</h4>
        <form method="POST" action="{{ route('order.store',$car->id) }}">
          @csrf
          <input type="text" name="buyer_name" placeholder="Nama" class="form-control mb-2" required>
          <input type="email" name="buyer_email" placeholder="Email" class="form-control mb-2" required>
          <textarea name="buyer_address" placeholder="Alamat" class="form-control mb-2"></textarea>
          <button class="btn btn-light w-100">Beli Sekarang</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
