<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login - Badminton Jagoku</title>
</head>

<body>

    <div class="mt-5 card-header text-black text-center">
        <b>Login - Badminton Jagoku</b>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('home') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username"
                                    value="{{ isset($_COOKIE['username']) ? $_COOKIE['username'] : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password"
                                    value="{{ isset($_COOKIE['password']) ? $_COOKIE['password'] : '' }}">
                            </div>
                            <div class="d-grid mb-3">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                        {{ isset($_COOKIE['username']) && isset($_COOKIE['password']) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
                        </form>
                        <p class="mt-3">Tidak mempunyai akun ? <a href="{{ route('register') }}">Daftarkan
                                sekarang</a></p>
                        <button type="button" class="btn btn-danger"
                            onclick="window.location='{{ route('index') }}'">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
