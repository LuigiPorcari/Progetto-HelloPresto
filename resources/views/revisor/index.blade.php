<x-layout documentTitle="Revisor Index">
    <div class="container-fluid mt-5 text-center bg-header">
        <div class="row">
            <div class="col-12 shadow">
                <h1 class="py-5 font-p p-welcome"> {{ __('ui.benvenutoRevisore') }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        @if (session()->has('message'))
            <div class="row justify-content-center mt-5">
                <div class="col-5 alert alert-success text-center shadow rounded alert-dismissible">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if ($foodbox_to_check)
            <div class="row justify-content-center pt-5">
                @if ($foodbox_to_check->images->count())
                    @foreach ($foodbox_to_check->images as $key => $image)
                        @if ($image->labels)
                            <div
                                class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center border bg-form-card shadow rounded-4 fs-5 mb-0 mb-md-4">
                                <p class="h4 text-center fs-4">Tags:</p>
                                <ul>
                                    @foreach ($image->labels as $label)
                                        <li>{{ $label }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <div class="col-12 col-md-4"></div>
                        @endif
                        <div class="col-12 col-md-4 mb-4 mt-4 mt-md-0">
                            <img src="{{ $image->getUrl(500, 500) }}" class="img-fluid rounded shadow"
                                alt="Immagine {{ $key + 1 }} della FoodBox {{ $foodbox_to_check->name }}">
                        </div>
                        <div
                            class="col-12 col-md-4 d-flex flex-column justify-content-center border align-items-center bg-form-card shadow rounded-4 fs-3 mb-4">
                            <div>{{ __('ui.Adulti') }}: <div class="{{ $image->adult }}"></div>
                            </div>
                            <div>{{ __('ui.Satira') }}: <div class="{{ $image->spoof }}"></div>
                            </div>
                            <div>{{ __('ui.Pillole') }}: <div class="{{ $image->medical }}"></div>
                            </div>
                            <div>{{ __('ui.Violenza') }}: <div class="{{ $image->violence }}"></div>
                            </div>
                            <div>{{ __('ui.ContenutoEsplicito') }}: <div class="{{ $image->racy }}"></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-6 col-md-4 text-center">
                        <img src='/img/foodbox_noback.png' alt="immagine segnaposto"
                            class="img-fluid">
                    </div>
                @endif
                <div
                    class="col-md-10 px-4 d-flex flex-column justify-content-center border bg-form-card shadow rounded-4 mt-5">
                    <div class="text-center">
                        <h1 class="pt-3">{{ $foodbox_to_check->name }}</h1>
                        @if ($foodbox_to_check->user)
                            <h3><span class="fw-bold">{{ __('ui.autore') }}</span> {{ $foodbox_to_check->user->name }}
                            </h3>
                        @else
                            <p><span class="fw-bold">{{ __('ui.autore') }}</span> Utente cancellato</p>
                        @endif
                        <h4>{{ $foodbox_to_check->price }}</h4>
                        <h4 class="fst-italic text-muted">#{{ __('ui.' . $foodbox_to_check->category->name) }}</h4>
                        <p class="h6">{{ $foodbox_to_check->body }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-between">
                        <form action="{{ route('reject', ['foodbox' => $foodbox_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 fw-bold">{{ __('ui.rifiuta') }}</button>
                        </form>
                        <form action="{{ route('accept', ['foodbox' => $foodbox_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 fw-bold">{{ __('ui.accetta') }}</button>
                        </form>
                        {{-- <form action="{{ route('undo', ['foodbox' => $foodbox_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-info py-2 fw-bold">{{__('ui.annulla')}}</button>
                    </form> --}}
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center mt-5">
                <div class="col-12">
                    <h1 class="fst-italic display-4">
                        {{ __('ui.nessunaFood') }}
                    </h1>
                    <a href="{{ route('home') }}" class="mt-5 btn btn-success">{{ __('ui.tornaHome') }}</a>
                    {{-- <form action="{{ route('undo', ['foodbox' => $foodbox_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-info py-2 fw-bold">Annula ultima operazione</button>
                </form> --}}
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-2 d-flex justify-content-center mt-5">
                @if (App\Models\FoodBox::orderBy('created_at', 'desc')->whereNotNull('is_accepted')->count() > 0)
                    <form action="{{ route('undo') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-warning py-2 fw-bold">{{ __('ui.annulla') }}</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-layout>
