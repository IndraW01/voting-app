@foreach ($tampilPemilih as $pemilih)
<div class="recent-message d-flex px-4 py-3">
    <div class="avatar">
        <img src="https://source.unsplash.com/random/30x30/?person">
    </div>
    <div class="name ms-4">
        <h6 class="mb-1">{{ $pemilih->nama }}</h6>
        <h6 class="text-muted mb-0">Kelas {{ $pemilih->kelas }} {{ $pemilih->angkatan }}</h6>
    </div>
</div>
@endforeach
