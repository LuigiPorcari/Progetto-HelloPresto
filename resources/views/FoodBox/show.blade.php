<x-layout documentTitle="detail">
    <div class="container-fluid mt-5">
        <div class="row ">
            <div class="col-12 p-0">
                <div class="container-fluid bg-header">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center shadow">
                            <h1 class="display-1 mb-5 mt-5 font-p p-welcome"> {{ __('ui.dettaglio') }} {{ $foodbox->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                @if ($foodbox->images->count() > 0)
                    <div id="carouselExampleAutoplaying" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($foodbox->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(500, 500) }}" class="d-block w-100 img-show rounded-4 shadow"
                                        alt="Immagine {{ $key + 1 }} della FoodBox {{ $foodbox->name }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($foodbox->images->count() > 1)
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="{{Storage::url('/img/foodbox_noback.png')}}" alt="Nessuna foto inserita dall'utente">
                @endif
            </div>
            <div class="col-md-6 col-12 bg-text shadow rounded-4 bg-form-card mt-5 mt-md-0">
                <h2>{{ $foodbox->name }}</h2>
                <p><span class="fw-bold">{{__('ui.prezzo')}}</span> {{ $foodbox->price }}</p>
                <p><span class="fw-bold">{{__('ui.categoria')}}</span> {{ __("ui." . $foodbox->category->name) }}</p>
                <p><span class="fw-bold">{{__('ui.descrizione')}}</span> {{ $foodbox->body }}</p>
                @if ($foodbox->user)
                    <p><span class="fw-bold">{{__('ui.autore')}}</span> {{ $foodbox->user->name }}</p>
                    @else
                        <p><span class="fw-bold">{{__('ui.autore')}}</span> {{__('ui.Utentecancellato')}}</p>
                @endif
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-12 bg-text shadow rounded-4 mt-5 bg-form-card">
                    <livewire:comment-form
                            foodboxId="{{$foodbox->id}}"
                    />
                </div>
            </div>
        </div>
    </div>
</x-layout>
