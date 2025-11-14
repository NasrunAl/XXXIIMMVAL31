<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Login | Sistem CRUD</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
<body class="bg-light d-flex align-items-center" style="height:100vh;"> 
 
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-4"> 
            <div class="card shadow-lg border-0 rounded-4"> 
                <div class="card-body p-4"> 
                    <h4 class="text-center mb-3">Login Admin</h4> 
 
                    @if(session('error')) 
                        <div class="alert alert-danger text-center py-2">{{ session('error') 
}}</div> 
                    @endif 
 
                    <form action="{{ route('login.post') }}" method="POST"> 
                        @csrf 
                        <div class="mb-3"> 
                            <label class="form-label">Username</label> 
                            <input type="text" name="username" class="form-control" 
required> 
                        </div> 
                        <div class="mb-3"> 
                            <label class="form-label">Password</label> 
                            <input type="password" name="password" class="form-control" 
required> 
                        </div> 
                        <button type="submit" class="btn btn-primary w
100">Login</button> 
                    </form> 
                </div> 
            </div> 
            <p class="text-center mt-3 text-secondary">© {{ date('Y') }} Sistem CRUD 
Laravel</p> 
        </div> 
    </div> 
</div> 
 
</body> 
</html>