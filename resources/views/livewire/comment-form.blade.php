<div>
    <form wire:submit.prevent='save'>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1"
                class="form-label mt-5 mb-1 font-p fw-bold fs-4">{{ __('ui.scrivicommento') }}</label>
            @guest
                <p class="text-center"><a class="btn btn-outline-success" href="{{ route('login') }}">{{ __('ui.accesso') }}</a>
                    <a class="btn btn-outline-success"
                        href="{{ route('register') }}">{{ __('ui.registrati') }}</a><br>{{ __('ui.percommentare') }}</p>
            @else
                <textarea name="body" class="form-control" cols="30" rows="5" wire:model='body'></textarea>
            @endguest
        </div>
        @if (Auth::user())
            <button type="submit" class="btn btn-outline-success">{{ __('ui.commenta') }}</button>
        @endif
    </form>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-2 font-p">{{ __('ui.commenti') }}</h5>
            </div>
        </div>
        @foreach ($comments as $comment)
                <div class="row comment-table rounded-4 shadow-sm mt-2">
                    <div class="col-11 mt-2">
                        @if ($comment->user == null)
                            <p>{{__('ui.Utentecancellato')}}</p>
                        @else
                            <div class="d-flex">
                                <p class="mt-2 fst-italic">{{ $comment->user->name }}</p>
                                <p class="fw-lighter small ms-auto fst-italic">
                                    {{ $comment->updated_at->diffForHumans() }}</p>
                            </div>
                        @endif
                        <p>
                            {{ $comment->body }}
                        </p>
                    </div>
                    <div class="col-1 my-auto">
                        @if (Auth::user() != null && $comment->user != null)
                            @if (Auth::user()->name == $comment->user->name)
                                <button class="btn btn-outline-secondary py-1 px-2 my-auto"
                                    wire:click="deleteComment({{ $comment->id }})"><i
                                        class="fa-regular fa-trash-can"></i></button>
                            @endif
                        @endif
                    </div>
                </div>
        @endforeach
        <div class="row justify-content-center mt-5">
            <div class="col-8">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
