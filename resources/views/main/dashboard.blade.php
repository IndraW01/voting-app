<x-app-layout page-heading="Dashboard" title="Dashboard Voting APP">
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <x-card-total color="purple" :total="$tampilPemilih[0]->total_pemilih" text="Total Pemilih" />
                    <x-card-total color="blue" :total="$tampilPemilih[0]->sudah_voting" text="Sudah Vote" />
                    <x-card-total color="red" :total="$tampilPemilih[0]->belum_voting" text="Belum Vote" />
                    <x-card-total color="green" :total="$tampilCalon->count()" text="Total Calon" />
                </div>
                <div class="row m-0">
                    <div class="card">
                        <div class="card-body px-0">
                            <h3 class=" text-center mb-3">Calon Ketua</h3>
                            <div class="row">
                                <x-card-calon :tampil-calon="$tampilCalon" vote="false" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                {{-- Pemilih Terbaru --}}
                <div class="card">
                    <div class="card-header">
                        <h6>Pemilih Terbaru</h6>
                    </div>
                    <div class="card-content pb-4">
                        <x-card-pemilih-terbaru :tampil-pemilih="$tampilPemilih" />
                    </div>
                </div>
                {{-- Chart --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Voting Chart</h4>
                    </div>
                    <div class="p-2">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('costum-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const tampilCalon = {{ Illuminate\Support\JS::from($tampilCalon) }};

        let calon = {
            namaCalon: [],
            jumlahVoting: []
        };

        tampilCalon.forEach((element, index) => {
            calon.namaCalon[index] = element.nama;
            calon.jumlahVoting[index] = element.jumlah_voting;
        });

        const data = {
        labels: calon.namaCalon,
        datasets: [{
            label: 'My First Dataset',
            data: calon.jumlahVoting,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
    @endpush
</x-app-layout>
