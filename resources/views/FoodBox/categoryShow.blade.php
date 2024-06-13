<x-layout documentTitle="categorie">
    <div class="container-fluid bg-header mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center shadow">
                <h1 class="display-1 mb-5 mt-5 font-p p-welcome">{{ __("ui.$category->name") }}</h1>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center ">
            @forelse ($foodboxes as $foodbox)
                <div class="col-md-4 col-12 mt-3 d-flex justify-content-center">
                    <div class="card rounded-5 shadow-lg text-center" style="width: 18rem;">
                        <img src="{{ $foodbox->images->isNotEmpty() ? $foodbox->images->first()->getUrl(500, 500) : '/img/foodbox_noback.png' }}"
                            class="card-img-top rounded-top-5" alt="Immagine dell'articolo {{ $foodbox->name }}">
                        <div class="card-body">
                            <h5 class="card-title"><span class="fw-bold">{{ __('ui.nome') }}</span>{{ $foodbox->name }}
                            </h5>
                            <p class="card-text"><span class="fw-bold">{{ __('ui.prezzo') }}</span>{{ $foodbox->price }}
                            </p>
                            <p><span class="fw-bold">{{ __('ui.categoria') }}</span>
                                {{ __('ui.' . $foodbox->category->name) }}</p>
                            <p> <span class="fw-bold">{{ __('ui.crea') }}</span>
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
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            {{ $foodboxes->links() }}
        </div>
    </div>
    </div>
</x-layout>
