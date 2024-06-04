<x-layout documentTitle="Search FoodBox">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center bg-header">
            <div class="col-12 text-center shadow">
                <h1 class="py-5 font-p p-welcome">{{ __('ui.risultati') }} "<span
                        class="fst-italic">{{ $query }}</span>"</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($foodboxes as $foodbox)
                <div class="col-12 col-md-4 d-flex justify-content-center mb-4">
                    <div class="card rounded-5 shadow-lg" style="width: 18rem;">
                        <img src="{{ $foodbox->images->isNotEmpty() ? $foodbox->images->first()->getUrl(500, 500) : Storage::url('/img/foodbox_noback.png') }}"
                            class="card-img-top rounded-top-5" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title"><span class="fw-bold">{{ __('ui.nome') }}</span> {{ $foodbox->name }}
                            </h5>
                            <p class="card-text"><span class="fw-bold">{{ __('ui.prezzo') }}</span>
                                {{ $foodbox->price }}</p>
                            <p class="card-text"><span class="fw-bold">{{ __('ui.descrizione') }}</span>
                                {{ $foodbox->body }}</p>
                            <div class="d-flex justify-content-center">
                                <p class="card-text fw-bold">{{ __('ui.categoria') }} </p>
                                <a class="ms-2 link-custom"
                                    href="{{ route('categoryShow', $foodbox->category->id) }}">{{ __('ui.' . $foodbox->category->name) }}</a>
                            </div>
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
            @endforelse
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-8">
                {{ $foodboxes->links() }}
            </div>
        </div>
    </div>
</x-layout>
