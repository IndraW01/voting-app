<x-app-layout page-heading="Tambah Data Calon" title="Tambah Data Calon Voting App">
    @push('costum-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('trix/trix.css') }}">
    <script type="text/javascript" src="{{ asset('trix/trix.js') }}"></script>
    <style>
        .trix-button-group--file-tools {
            display: none !important;
        }
    </style>
    @endpush

    <div class="page-content" id="alertVote">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Calon</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" method="POST" action="{{ route('calon.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
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
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="foto_calon">Upload Foto Pemilih</label>
                                                <img id="foto_calon_preview" alt="image preview" width="100px"
                                                    class="d-none img-thumbnail mb-2" />
                                                <input class="form-control @error('foto_calon') is-invalid @enderror"
                                                    type="file" id="foto_calon" name="foto_calon" />
                                                @error('foto_calon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="visi">Visi</label>
                                                <input id="visi" type="hidden" name="visi" value="{{ old('visi') }}">
                                                <trix-editor input="visi"></trix-editor>
                                                @error('visi')
                                                <span class="text-danger" style="font-size: 15px">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="misi">Misi</label>
                                                <input id="misi" type="hidden" name="misi" value="{{ old('misi') }}">
                                                <trix-editor input="misi"></trix-editor>
                                                @error('misi')
                                                <span class="text-danger" style="font-size: 15px">
                                                    {{ $message }}
                                                </span>
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
        // Select Angkatan
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

        // Trix Config
        window.addEventListener("trix-file-accept", function(event) {
            event.preventDefault()
            alert("File attachment not supported!")
        })

        // Preview Image
        const fotoPemilihPreview = document.getElementById('foto_calon_preview');
        const fotoPemilihInput = document.getElementById('foto_calon');

        fotoPemilihInput.addEventListener('change', function() {
            var render = new FileReader();
            render.readAsDataURL(fotoPemilihInput.files[0]);

            render.addEventListener('load', function(event) {
                fotoPemilihPreview.classList.remove('d-none');
                fotoPemilihPreview.classList.add('d-block');
                fotoPemilihPreview.src = event.target.result;
            });
        })
    </script>
    @endpush

</x-app-layout>
