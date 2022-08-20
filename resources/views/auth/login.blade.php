<x-app-auth title="Login">
    <div id="auth-left">
        <div class="auth-logo">
            <a href="index.html" style="font-size: 32px; font-weight: 700">Voting APP</a>
        </div>
        <h1 class="auth-title" style="font-size: 24px; margin-top: -80px">Log in.</h1>
        <p class="auth-subtitle mb-4" style="font-size: 20px">Login dengan data valid anda, dan pilih calon
            anda.
        </p>

        @error('failed')
        <div class="alert alert-danger mb-4" role="alert">
            {{ $message }}
        </div>
        @enderror

        @if (session('success'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input style="font-size: 16px" type="text" name="username" id="username"
                    class="form-control form-control @error('username') is-invalid @enderror" placeholder="Username"
                    value="{{ old('username') }}">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input style="font-size: 16px" type="password" name="password" id="password"
                    class="form-control form-control @error('password') is-invalid @enderror" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
        </form>
        <div class="text-center mt-4 text-lg fs-4">
            <p style="font-size: 18px" class="text-gray-600">Belum Punya Akun? <a href="{{ route('register.create') }}"
                    class="font-bold">Register Sekarang</a>.</p>
        </div>
    </div>
</x-app-auth>
