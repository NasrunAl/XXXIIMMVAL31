<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Tambah Data</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
<body class="bg-light"> 
<div class="container py-5"> 
    <div class="card shadow border-0 rounded-4"> 
        <div class="card-body"> 
            <h4 class="mb-4">Tambah Data Baru</h4> 
            <form action="{{ route('crud.store') }}" method="POST" 
enctype="multipart/form-data"> 
                @csrf 
                <div class="mb-3"> 
                    <label class="form-label">Nama</label> 
                    <input type="text" name="nama" class="form-control" required> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label">Keahlian</label> 
                    <input type="text" name="keahlian" class="form-control" required> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label">Foto</label> 
                    <input type="file" name="foto" class="form-control"> 
                </div> 
                <button type="submit" class="btn btn-success">Simpan</button> 
                <a href="{{ route('crud.index') }}" class="btn btn-secondary">Kembali</a> 
            </form> 
        </div> 
    </div> 
</div> 
</body> 
</html> 