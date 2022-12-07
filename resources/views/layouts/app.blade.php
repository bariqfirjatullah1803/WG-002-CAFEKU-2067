<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Manage
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('menu.index') }}">
                                        Menu
                                    </a>
                                    <a class="dropdown-item" href="{{ route('kategori.index') }}">
                                        Kategori
                                    </a>
                                    @if (Auth::user()->role == 'owner')
                                        <a class="dropdown-item" href="{{ route('user.index') }}">
                                            Role
                                        </a>
                                    @endif
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5 my-5">
            @yield('content')
        </main>
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-white text-muted" style="height: 300px">
            <!-- Section: Links  -->
            <section class="p-4">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3 justify-content-start">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                {{ config('app.name', 'Laravel') }}
                            </h6>
                            <p>
                                Alamat : Jl. Watu Gong No.18, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur
                                65145
                            </p>
                        </div>
                        <!-- Grid column -->


                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
                © 2022 Copyright:
                <a class="text-reset fw-bold" href="{{ route('index') }}"> {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $('#submit').click(function(e) {
            nama = $('#nama').val()
            menu = $('#menu').val()
            status = $('#status').val()
            
            // console.log(menu)
            getData(nama, menu, status)
        });

        function getData(nama, menu, status) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "pesan",
                data: {
                    nama: nama,
                    menu: menu,
                    status: status
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#result_nama').val(response.nama)
                    $('#result_jumlah_pesanan').val(response.jumlah_pesanan + ' Pcs')
                    $('#result_total_pesanan').val("Rp " + response.total_pesanan)
                    $('#result_status').val(response.status)
                    $('#result_diskon').val("Rp " + response.diskon)
                    $('#result_total_pembayaran').val("Rp " + response.total_pembayaran)
                }
            });
        }
    </script>
</body>

</html>
