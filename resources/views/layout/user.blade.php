<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><b>Badminton Jagoku - Indonesia</b></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                @if (session('is_logged_in'))
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('product_user') ? 'active' : '' }}"
                                href="{{ route('view_product') }}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('lapangan_user') ? 'active' : '' }}"
                                href="{{ route('view_lapangan') }}">Lapangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('booking') ? 'active' : '' }}"
                                href="{{ route('booking_info') }}">Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('jadwal') ? 'active' : '' }}"
                                href="{{ route('jadwal.index') }}">Informasi Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('membership/status') ? 'active' : '' }}"
                                href="{{ route('membership.status', ['id_pengguna' => $idPengguna ?? 'id_pengguna']) }}">Beli
                                membership</a>
                        </li>
                        @if (session('jenis_pengguna') === 'pemilik')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                    href="{{ url('/admin_dashboard') }}">Admin Dashboard</a>
                            </li>
                        @endif
                    </ul>
                @else
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('product_user') ? 'active' : '' }}"
                                href="{{ route('view_product') }}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('lapangan_user') ? 'active' : '' }}"
                                href="{{ route('view_lapangan') }}">Lapangan</a>
                        </li>
                    </ul>
                @endif
                <div class="d-flex align-items-center">
                    @php
                        use App\Helpers\UserHelper;
                    @endphp
                    @if (session('is_logged_in'))
                        <span class="navbar-text text-light me-3">
                            @if (UserHelper::isMember(session('id_pengguna')))
                                Member Status: <span class="badge bg-success">Membership</span>
                            @else
                                Member Status: <span class="badge bg-danger">Not a Membership</span>
                            @endif
                        </span>
                        <a href="{{ route('cart') }}" class="cart-icon-link text-light me-5">
                            <i class="bi bi-cart-fill cart-icon" aria-hidden="true" style="font-size: 24px;"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-light me-2">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="container mt-4">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">@yield('title')</a>
                            @if (session('is_logged_in') && request()->is('/'))
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        @yield('dynamic_nav_links')
                                    </ul>
                                </div>
                                <span class="navbar-text">
                                    Welcome, {{ session('username') }}!
                                </span>
                            @else
                                <a class="navbar-brand" href="#"><small>@yield('sub_title')</small></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        @yield('dynamic_nav_links')
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </nav>
                </div>
            </header>

            <hr />
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="container mt-4">
        <div>@yield('contents')</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pF9xv3JhNhJ5jUvDYpMDy5k3gnh+o34s+5BktmRVXHh/bT9jpBn8BvWBf5SL+xI1" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            let copyButtonTrans = 'copy'
            let csvButtonTrans = 'csv'
            let excelButtonTrans = 'excel'
            let pdfButtonTrans = 'pdf'
            let printButtonTrans = 'print'
            let colvisButtonTrans = 'Column visibility'
            let languages = {
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };
            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                className: 'btn'
            })
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [{
                        extend: 'copy',
                        className: 'btn-outline-secondary mx-2',
                        text: copyButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-outline-secondary mx-2',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-outline-secondary mx-2',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-outline-secondary mx-2',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-outline-secondary mx-2',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                ]
            });
            $.fn.dataTable.ext.classes.sPageButton = '';
        });
    </script>
    @stack('script-alt')
    <!-- Page level custom scripts -->
    <!-- <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script> -->

</body>

</html>
