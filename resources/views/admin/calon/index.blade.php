<x-app-layout page-heading="Data Calon" title="Data Calon Voting App">
    @push('costum-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    @endpush

    <div class="page-content" id="alertVote">
        <section class="section">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6>Data Calon</h6>
                    <div class="btn-all">
                        {{-- Tambah Pemilih --}}
                        <a href="{{ route('calon.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Calon
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Angkatan</th>
                                <th>Kelas</th>
                                <th>Foto</th>
                                <th>Tampil Calon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <x-modal-import />

    @push('costum-js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(function () {
        let table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('calon.index') }}",
            initComplete: function(settings, json) {
                const hapusCalon = document.querySelectorAll('.hapusCalon');
                hapusCalon.forEach(formCalon => {
                    formCalon.addEventListener('click', function(event) {
                        event.preventDefault();
                        let btnForm = this.children[2].value;
                        Swal.fire({
                            title: 'Hapus',
                            text: "Apakah anda ingin menghapus calon " + btnForm + ", Jika iya? Voting " + btnForm + " Akan dihapus!",
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Hapus!'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                this.submit();
                            }
                        })
                    })
                });
            },
            columns: [
                {data: 'nama', name: 'nama'},
                {data: 'nim', name: 'nim'},
                {data: 'angkatan', name: 'angkatan'},
                {data: 'kelas', name: 'kelas'},
                {data: 'foto_calon', name: 'foto_calon'},
                {data: 'calonkan', name: 'calonkan', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


    </script>
    @endpush
</x-app-layout>
