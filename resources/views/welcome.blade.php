<x-layout documentTitle="Homepage">
    {{-- header --}}
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 d-none d-md-block p-0 position-relative">
                <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner carousel-img carousel-blur">
                        <div class="carousel-item active">
                            <img src="/img/Screenshot-2023-09-18-alle-09.28.04.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/last-diet-1920-x-1080.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/asdfmovie.webp" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center text-center titoloH">
                    <h1 class="display-1 my-5 h1-welcome fw-bold font-title">HelloPresto!</h1>
                    <p class="mb-5 p-welcome fw-bold font-p  "> {{ __('ui.preparaDieta') }}</p>
                </div>
            </div>
        </div>
    </div>
    {{-- fine header --}}

    @if (session('status'))
        <div class="alert alert-success alert-dismissible mb-0 text-center shadow rounded">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded alert-dismissible mb-0">
            {{ session('errorMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded alert-dismissible mb-0">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid bg-home">
        <div class="row justify-content-center">
            <div class="col-12 text-center py-5">
                <h2 class="display-3 fw-bold w-100 p-home">{{ __('ui.ultimefood') }}</h2>
            </div>
            @forelse ($foodboxes as $foodbox)
                <div class="col-md-4 mt-5 d-flex justify-content-center">
                    <div class="card rounded-5 shadow-lg text-center bg-form-card" style="width: 18rem;">
                        <img src="{{ $foodbox->images->isNotEmpty() ? $foodbox->images->first()->getUrl(500, 500) : Storage::url('/img/foodbox_noback.png') }}"
                            class="card-img-top rounded-top-5" alt="Immagine dell'articolo {{ $foodbox->name }}">
                        <div class="card-body">
                            <h5 class="card-title"><span class="fw-bold">{{ __('ui.nome') }}</span> {{ $foodbox->name }}
                            </h5>
                            <p class="card-text"><span class="fw-bold">{{ __('ui.prezzo') }}</span>
                                {{ $foodbox->price }}</p>
                            <div class="d-flex justify-content-center">
                                <p class="fw-bold">{{ __('ui.categoria') }}</p>
                                <a class="ms-2 link-custom"
                                    href="{{ route('categoryShow', $foodbox->category->id) }}">{{ __('ui.' . $foodbox->category->name) }}</a>
                            </div>
                            <p><span class="fw-bold">{{ __('ui.crea') }}</span>
                                {{ $foodbox->created_at->format('d/m/Y H:i:s') }}</p>
                            @if ($foodbox->user)
                                <p><span class="fw-bold">{{ __('ui.autore') }}</span> {{ $foodbox->user->name }}</p>
                            @else
                                <p><span class="fw-bold">{{ __('ui.autore') }}</span> Utente cancellato</p>
                            @endif
                            <a href="{{ route('foodbox.show', $foodbox) }}"
                                class="btn btn-outline-success">{{ __('ui.dettaglio') }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-12 text-center mt-5 d-flex vh-100 justify-content-md-center align-items-center flex-column">
                    <h3 class="fst-italic">{{ __('ui.Gatto') }}</h3>
                    <img class="classeGatto" src="/img/GattoVero.png" alt="">
                </div>
        </div>
        @endforelse
    </div>
    </div>

</x-layout>
