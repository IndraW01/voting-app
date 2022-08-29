<div class="d-flex justify-content-between mb-2">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="dropdown">
        <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
            data-bs-toggle="dropdown" aria-expanded="false">
            <div class="avatar avatar-md2">
                <img src="{{ asset('storage/pemilih/' . \Auth::user()->pemilih->foto_pemilih) }}" alt="Avatar">
            </div>
            <div class="text">
                <h6 class="user-dropdown-name">{{ \Auth::user()->username }}</h6>
                <p class="user-dropdown-status text-sm text-muted">Admin</p>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-start shadow-lg mt-2" aria-labelledby="topbarUserDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('dashboard.voting') }}">Dashboard Voting</a></li>
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
