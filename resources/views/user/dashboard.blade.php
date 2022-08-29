<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Voting</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="assets/css/shared/iconly.css">

</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="/" style="font-size: 24px">Voting APP</a>
                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="{{ asset('storage/pemilih/' . \Auth::user()->pemilih->foto_pemilih) }}"
                                            alt="Avatar">
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ $pemilih->nama }}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">Pemilih</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg mt-2"
                                    aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    @if (\Auth::user()->is_admin)
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard Admin</a>
                                    </li>
                                    @endif
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                            @csrf
                                            <button type="submit" class="dropdown-item p-0">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="content-wrapper container">

                @if (session('successVote'))
                <div class="alert alert-info" role="alert">
                    {{ session('successVote') }}
                </div>
                @endif

                @if (!$pemilih->voting)
                <div class="page-heading">
                    <h3>Pilih Calon</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="card">
                            <div class="card-body px-0">
                                <h3 class=" text-center mb-3 text-primary font-bold">Calon Ketua</h3>
                                <div class="row">
                                    <x-card-calon :tampil-calon="$tampilCalon" vote="true" />
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                @else
                <div class="alert alert-warning text-white" role="alert">
                    Anda Sudah Melakukan Vote
                </div>
                @endif

            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/horizontal-layout.js"></script>

</body>

</html>
