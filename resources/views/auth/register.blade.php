<x-app-auth title="Register">
    <div id="auth-left">
        <div class="auth-logo">
            <a href="index.html" style="font-size: 32px; font-weight: 700">Voting APP</a>
        </div>
        <h1 class="auth-title" style="font-size: 24px; margin-top: -80px">Register.</h1>
        <p class="auth-subtitle mb-4" style="font-size: 20px">Registrasi akun, dan pilih calon
            anda.
        </p>

        @error('failed')
        <div class="alert alert-danger mb-4" role="alert">
            {{ $message }}
        </div>
        @enderror

        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input style="font-size: 16px" type="text" name="username" id="username"
                    class="form-control @error('username') is-invalid @enderror" placeholder="Username"
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
                <input style="font-size: 16px" type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                    value="{{ old('email') }}">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input style="font-size: 16px" type="text" name="nama" id="nama"
                    class="form-control @error('nama') is-invalid @enderror" placeholder="Nama"
                    value="{{ old('nama') }}">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input style="font-size: 16px" type="number" name="nim" id="nim"
                    class="form-control @error('nim') is-invalid @enderror" placeholder="nim" value="{{ old('nim') }}">
                <div class="form-control-icon">
                    <i class="bi bi-fingerprint"></i>
                </div>
                @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <select class="form-control form-select @error('angkatan') is-invalid @enderror" name="angkatan"
                    id="angkatan">
                    <option value="Angkatan">Angkatan</option>
                    @for ($i = 2019; $i <= 2022; $i++) <option value="{{ $i }}" @selected(old('angkatan')==$i)>{{ $i }}
                        </option>
                        @endfor
                </select>
                <div class="form-control-icon">
                    <i class="bi bi-calendar-minus"></i>
                </div>
                @error('angkatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <select class="form-control form-select @error('kelas') is-invalid @enderror" name="kelas" id="kelas">
                    <option>Kelas</option>
                    @if (old('kelas'))
                    @if (old('angkatan') == '2019')
                    <option value="A" @selected(old('kelas')=='A' )>A
                    </option>
                    <option value="B" @selected(old('kelas')=='B' )>B
                    </option>
                    <option value=C" @selected(old('kelas')=='C' )>C
                    </option>
                    @elseif (old('angkatan') == 'Angkatan')
                    @else
                    <option value="A" @selected(old('kelas')=='A' )>A
                    </option>
                    <option value="B" @selected(old('kelas')=='B' )>B
                    </option>
                    @endif
                    @endif
                </select>
                <div class="form-control-icon">
                    <i class="bi bi-sort-alpha-up"></i>
                </div>
                @error('kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative mb-4">
                <input class="form-control @error('foto_pemilih') is-invalid @enderror" type="file" id="formFile"
                    name="foto_pemilih">
                @error('foto_pemilih')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input style="font-size: 16px" type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Register</button>
        </form>
        <div class="text-center mt-4 text-lg fs-4">
            <p style="font-size: 18px" class="text-gray-600">Sudah Punya Akun? <a href="{{ route('login.create') }}"
                    class="font-bold">Login Sekarang</a>.</p>
        </div>
    </div>


    @push('costum-js')
    <script>
        const angkatan = document.getElementById('angkatan');
        const kelas = document.getElementById('kelas');

        angkatan.addEventListener('change', function(event) {
            if(event.target.value == 2019) {
                kelas.innerHTML = '';
                let option = `<option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>`

                kelas.insertAdjacentHTML('beforeend', option);
            } else if(event.target.value == 'Angkatan'){
                kelas.innerHTML = '';
                let option = `<option>Kelas</option>`

                kelas.insertAdjacentHTML('beforeend', option);
            }
            else {
                kelas.innerHTML = '';
                let option = `<option value="A">A</option>
                            <option value="B">B</option>`

                kelas.insertAdjacentHTML('beforeend', option);
            }
        });
    </script>
    @endpush
</x-app-auth>
