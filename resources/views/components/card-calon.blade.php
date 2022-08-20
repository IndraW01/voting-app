@forelse ($tampilCalon as $calon)
<div class="col-md-4">
    <div class="card shadow collapse-icon accordion-icon-rotate">
        <div class="card-header d-flex flex-column justify-center align-items-center">
            <h6 class="text-center">{{ $calon->nama }}</h6>
            <img src="https://source.unsplash.com/random/200x200/?person" class="img-thumbnail" width="100%"
                alt="{{ $calon->nim }}">
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne{{ $calon->nim }}" aria-expanded="false"
                                aria-controls="collapseOne{{ $calon->nim }}">
                                Visi
                            </button>
                        </h2>
                        <div id="collapseOne{{ $calon->nim }}" class="accordion-collapse collapse"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-black">
                                {!! $calon->kampanye->visi !!}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo{{ $calon->nim }}" aria-expanded="false"
                                aria-controls="collapseTwo{{ $calon->nim }}">
                                Misi
                            </button>
                        </h2>
                        <div id="collapseTwo{{ $calon->nim }}" class="accordion-collapse collapse"
                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-black">
                                <ul>
                                    {!! $calon->kampanye->misi !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($vote == 'true')
                <form action="{{ route('dashboard.voting.vote', ['calon' => $calon->nim]) }}" method="POST"
                    class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-primary d-block" style="width: 100%">Vote</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@empty
<h3>Tidak Ada Calon Aktif</h3>
@endforelse
