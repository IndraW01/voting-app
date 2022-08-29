<x-app-layout page-heading="Detail Data Calon" title="Detail Data Calon Voting App">

    <div class="page-content" id="alertVote">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <img class="card-img-top img-thumbnail mb-3"
                                    src="{{ asset('storage/calon/' . $calon->foto_calon) }}" alt="{{ $calon->nama }}">

                                <a href="{{ route('calon.index') }}" class="btn btn-primary"><i
                                        class="bi bi-arrow-left"></i> Kembali</a>
                                @if ($calon->calonkan)
                                <form action="{{ route('calon.tidakAktif', $calon) }}" method="POST" id="calonkan"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning" id="btnCalonkan"
                                        data-nama="{{ $calon->nama }}"><i class="bi bi-x-lg"></i> No
                                        Aktif</button>
                                </form>
                                @else
                                <form action="{{ route('calon.aktif', $calon) }}" method="POST" id="calonkan"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success" id="btnCalonkan"
                                        data-nama="{{ $calon->nama }}"><i class="bi bi-check2"></i>
                                        Aktif</button>
                                </form>
                                @endif
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <h4 class="card-title">{{ $calon->nama }}</h4>
                                <table>
                                    <tr>
                                        <th>Nim</th>
                                        <th>: {{ $calon->nim }}</th>
                                    </tr>
                                    <tr>
                                        <th>Angkatan</th>
                                        <th>: {{ $calon->angkatan }}</th>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>: {{ $calon->kelas }}</th>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Visi
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingOne"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-black">
                                                    {!! $calon->kampanye->visi !!}
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Misi
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body text-black">
                                                        {!! $calon->kampanye->misi !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('costum-js')
        <script>
            const calon = document.getElementById('calonkan');
            const btnCalonkan = document.getElementById('btnCalonkan');
            calon.addEventListener('click', function(event) {
                event.preventDefault();
                if(btnCalonkan.classList.contains('btn-success')) {
                    Swal.fire({
                    title: 'Aktif',
                    text: "Apakah anda ingin mencalonkan " + btnCalonkan.dataset.nama,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Calonkan!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        calon.submit();
                    }
                })
                } else {
                    Swal.fire({
                    title: 'Tidak Aktif',
                    text: "Apakah anda ingin nonaktifkan calon, jika Iya? Voting "+ btnCalonkan.dataset.nama +" Akan Di Reset Ulang",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Tidak, Calonkan!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        calon.submit();
                    }
                })
                }

            });
        </script>
        @endpush
</x-app-layout>
