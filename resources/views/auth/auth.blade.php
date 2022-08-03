<style>
    body {
        background-color: purple;
    }

    .form-inputs {
        position: relative;
    }

    .form-inputs .form-control {
        height: 45px;
    }

    .form-inputs .form-control:focus {
        box-shadow: none;
        border: 1px solid #000;
    }

    .form-inputs i {
        position: absolute;
        right: 10px;
        top: 15px;
    }

    .shop-bag {
        background-color: #000;
        color: #fff;
        height: 50px;
        width: 50px;
        font-size: 25px;
        display: flex;
        border-radius: 50%;
        align-items: center;
        justify-content: center;
    }

    .qty {
        font-size: 12px;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<header class="section-header">

    <nav class="navbar navbar-dark navbar-expand p-0 bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav d-none d-md-flex mr-auto">
                <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Cash On Delivery</a></li>
                <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Free Delivery</a></li>
                <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Cash Backs</a></li>
            </ul>
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item">
                    <div class="d-flex flex-row">
                        <img src="https://i.imgur.com/EYFtR83.jpg" class="rounded-circle" width="30">
                    </div>
                </li>
                <li class="nav-item">
                    @if (Auth::user())
                        <a href="#" class="nav-link d-flex align-items-center"
                            data-abc="true"><span>{{ Auth::user()->name }}</span><i class='bx bxs-chevron-down'></i></a>
                    @endif

                </li>

            </ul> <!-- list-inline //  -->
        </div> <!-- navbar-collapse .// -->
        <!-- container //  -->
    </nav> <!-- header-top-light.// -->

    <section class="header-main border-bottom bg-white">
        <div class="container-fluid">
            <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
                <div class="col-md-2">
                    <img class="d-none d-md-flex" src="https://i.imgur.com/R8QhGhk.png" width="100">
                </div>
                <div class="col-md-8">
                    <div class="d-flex form-inputs">
                        <input class="form-control" type="text" placeholder="Search any product...">
                        <i class="bx bx-search"></i>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="d-flex d-none d-md-flex flex-row align-items-center">
                        <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                        <div class="d-flex flex-column ms-2">
                            <span class="qty">1 Product</span>
                            <span class="fw-bold">$27.90</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-md-none d-md-flex" href="#">Categories</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('auth.getlogin') }}">đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.getregister') }}">đăng ký</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
@yield('main')
