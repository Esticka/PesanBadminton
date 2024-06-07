<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="px-4 py-2 shadow">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="p-2.5 mt-1 d-flex align-items-center">
                        <h1 class="font-bold text-gray text-sm m-0">
                            @if(session('jenis_pengguna') === 'pemilik')
                            Admin "{{ session('username') }}"
                            
                            @else
                            Manager "{{ session('username') }}"
                            @endif
                        
                        </h1>
                    </div>
                    <hr class="my-2 bg-secondary">
                </div>
                <div class="col-auto d-flex align-items-center">
                    <div class="dropdown">
                        Halo, <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ session('username') }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            {{-- <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> --}}
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-3 col-lg-2 col-xl-2 d-flex flex-column bg-dark">
                <div class="sidebar 100-vh" style="height: 100%; overflow-y: auto;">
                    <a href="{{ route('admin_dashboard') }}" class="text-decoration-none text-light">
                        <div class="p-2.5 mt-3 d-flex align-items-center rounded hover:bg-primary cursor-pointer">
                            <i class="bi bi-house-door-fill"></i>
                            <span class="text-gray-200 ms-3">Dashboard</span>
                        </div>
                    </a>
                    <a href="{{ route('product') }}" class="text-decoration-none text-light">
                        <div class="p-2.5 mt-3 d-flex align-items-center rounded hover:bg-primary cursor-pointer">
                            <i class="bi bi-cart"></i>
                            <span class="text-gray-200 ms-3">Product</span>
                        </div>
                    </a>
                    <a href="{{ route('purchase.index') }}" class="text-decoration-none text-light">
                        <div class="p-2.5 mt-3 d-flex align-items-center rounded hover:bg-primary cursor-pointer">
                            <i class="bi bi-bag-dash-fill"></i>
                            <span class="text-gray-200 ms-3">List Purchases</span>
                        </div>
                    </a>
                    <a href="{{ route('lapangan_index') }}" class="text-decoration-none text-light">
                        <div class="p-2.5 mt-3 d-flex align-items-center rounded hover:bg-primary cursor-pointer">
                            <i class="bi bi-map"></i>
                            <span class="text-gray-200 ms-3">Court</span>
                        </div>
                    </a>
                    <a href="{{ route('booking_list') }}" class="text-decoration-none text-light">
                        <div class="p-2.5 mt-3 d-flex align-items-center rounded hover:bg-primary cursor-pointer">
                            <i class="bi bi-list-check"></i>
                            <span class="text-gray-200 ms-3">List Booking</span>
                        </div>
                    </a>
                    @if (session('jenis_pengguna') === 'pemilik')
                        <a href="{{ route('pengelola') }}" class="text-decoration-none text-light">
                            <div class="p-2.5 mt-3 d-flex align-items-center rounded hover:bg-primary cursor-pointer">
                                <i class="bi bi-person-check-fill"></i></i>
                                <span class="text-gray-200 ms-3">Manager</span>
                            </div>
                        </a>
                        <a href="{{ route('pengguna') }}" class="text-decoration-none text-light">
                            <div class="p-2.5 mt-3 d-flex align-items-center rounded hover:bg-primary cursor-pointer">
                                <i class="bi bi-people-fill"></i>
                                <span class="text-gray-200 ms-3">Player</span>
                            </div>
                        </a>
                    @endif
                    <a href="#" class="text-decoration-none text-light">
                        <div class="p-2.5 mt-3 d-flex align-items-center rounded hover:bg-primary cursor-pointer">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span class="text-gray-200 ms-3">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light me-2">Logout</button>
                                </form>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-9 col-lg-10 col-xl-10 px-4 py-5">
                @yield('contents')
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
