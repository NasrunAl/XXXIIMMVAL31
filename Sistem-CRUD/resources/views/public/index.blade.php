<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Porsche Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
  <div class="container py-5">
    <h1 class="text-center mb-4">Daftar Mobil Porsche</h1>
    <div class="row">
      @foreach($cars as $car)
      <div class="col-md-4 mb-4">
        <div class="card bg-secondary text-white">
          <img src="{{ asset('storage/'.$car->main_image) }}" class="card-img-top" alt="{{ $car->title }}">
          <div class="card-body">
            <h5>{{ $car->title }}</h5>
            <p>Rp {{ number_format($car->price,0,',','.') }}</p>
            <a href="{{ route('car.show',$car->slug) }}" class="btn btn-light">Lihat Detail</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>
</html>
