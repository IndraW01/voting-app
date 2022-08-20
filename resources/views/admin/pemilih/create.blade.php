<x-app-layout page-heading="Tambah Data Pemilih" title="Tambah Data Pemilih Voting App">
    <div class="page-content" id="alertVote">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Pemilih</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" method="POST" action="{{ route('pemilih.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" id="username"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    placeholder="Username" name="username"
                                                    value="{{ old('username') }}">
                                                @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email" name="email" value="{{ old('email') }}">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Password" name="password">
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    placeholder="Nama" name="nama" value="{{ old('nama') }}">
                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nim">Nim</label>
                                                <input type="text" id="nim"
                                                    class="form-control @error('nim') is-invalid @enderror"
                                                    placeholder="Nim" name="nim" value="{{ old('nim') }}">
                                                @error('nim')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="angkatan">Angkatan</label>
                                                <select class="form-select @error('angkatan') is-invalid @enderror"
                                                    id="angkatan" name="angkatan">
                                                    <option></option>
                                                    @for ($i = 2019; $i <= 2022; $i++) <option value="{{ $i }}"
                                                        @selected(old('angkatan')==$i)>{{ $i }}</option>
                                                        @endfor
                                                </select>
                                                @error('angkatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="foto_pemilih">Upload Foto Pemilih</label>
                                                <input class="form-control @error('foto_pemilih') is-invalid @enderror"
                                                    type="file" id="foto_pemilih" name="foto_pemilih" />
                                                @error('foto_pemilih')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <select class="form-select @error('kelas') is-invalid @enderror"
                                                    id="kelas" name="kelas">
                                                    @if (old('kelas'))
                                                    @if (old('angkatan') == '2019')
                                                    <option value="A" @selected(old('kelas')=='A' )>A
                                                    </option>
                                                    <option value="B" @selected(old('kelas')=='B' )>B
                                                    </option>
                                                    <option value=C" @selected(old('kelas')=='C' )>C
                                                    </option>
                                                    @else
                                                    <option value="A" @selected(old('kelas')=='A' )>A
                                                    </option>
                                                    <option value="B" @selected(old('kelas')=='B' )>B
                                                    </option>
                                                    @endif
                                                    @endif
                                                </select>
                                                @error('kelas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1"><i
                                                    class="bi bi-plus-circle-fill"></i> Tambah</button>
                                            <a href="{{ route('pemilih.index') }}"
                                                class="btn btn-light-secondary me-1 mb-1"><i
                                                    class="bi bi-arrow-left"></i> Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
            } else if(event.target.value == ''){
                kelas.innerHTML = '';
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

</x-app-layout>
