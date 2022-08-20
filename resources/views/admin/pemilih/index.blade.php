<x-app-layout page-heading="Data Pemilih" title="Data Pemilih Voting App">
    @push('costum-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    @endpush

    <div class="page-content" id="alertVote">
        <section class="section">
            @error('vote.*')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            @error('file')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('failures'))
            <div class="alert alert-danger" role="alert">
                Baris Ada Yang Error
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th>Row</th>
                            <th>Attribute</th>
                            <th>Error</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('failures') as $failure)
                        <tr>
                            <td>{{ $failure->row() }}</td>
                            <td>{{ $failure->attribute() }}</td>
                            <td>{{ $failure->errors()[0] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <form action="{{ route('pemilih.reset') }}" method="POST" id="formResetCheckedVotes">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h6>Data Pemilih</h6>
                        <div class="btn-all">
                            {{-- Button Reset --}}
                            <button type="submit" id="resetChekedVotes" class="btn btn-warning"><i
                                    class="bi bi-trash-fill"></i> Reset
                                Vote</button>

                            {{-- Buton Import --}}
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#importModal">
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i> Import Pemilih
                            </button>

                            {{-- Tambah Pemilih --}}
                            <a href="{{ route('pemilih.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle-fill"></i> Tambah Pemilih
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Pemilih Terbaru</th>
                                    <th>Nama</th>
                                    <th>Nim</th>
                                    <th>Angkatan</th>
                                    <th>Kelas</th>
                                    <th>Vote</th>
                                    <th>Select Vote</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
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
            ajax: "{{ route('pemilih.index') }}",
            columns: [
                {data: 'created_at', name: 'created_at'},
                {data: 'nama', name: 'nama'},
                {data: 'nim', name: 'nim'},
                {data: 'angkatan', name: 'angkatan'},
                {data: 'kelas', name: 'kelas'},
                {data: 'vote', name: 'vote', orderable: false, searchable: false},
                {data: 'checkVote', name: 'checkVote', orderable: false, searchable: false},
                ]
            });
        });

        const resetChekedVotes = document.getElementById('resetChekedVotes');
        const formResetCheckedVotes = document.getElementById('formResetCheckedVotes');

        resetChekedVotes.addEventListener('click', function(event) {
            event.preventDefault();

            // SweetAlert2
            Swal.fire({
                title: 'Yakin Reset Vote?',
                text: "Jika Anda Reset Maka Vote Hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Reset!'
                }).then((result) => {
                if (result.isConfirmed) {
                    formResetCheckedVotes.submit();
                }
            })
        });
    </script>
    @endpush
</x-app-layout>
