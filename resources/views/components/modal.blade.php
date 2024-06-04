<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-form-card border">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">{{__('ui.perchèrevisore')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('become.revisor') }}" method="POST">
                    @csrf
                    @method('post')
                    @if (Auth::user())
                        @if (Auth::user()->is_revisor == false)
                            @if (Auth::user()->revisor_check == false)
                                <div>
                                    <label class="form-label" for="">{{__('ui.messaggio')}}</label>
                                    <textarea class="form-control" name="message" cols="30" rows="5"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success">{{__('ui.invia')}}</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">{{__('ui.chiudi')}}</button>
                                </div>
                            @else
                                <p>{{__('ui.giàmandato')}}</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">{{__('ui.chiudi')}}</button>
                                </div>
                            @endif
                        @else
                            <p>{{__('ui.giàrevisore')}}</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.chiudi')}}</button>
                            </div>
                        @endif
                    @else
                        <p>{{__('ui.nonseiregistrato')}}</p>
                        <div class="modal-footer">
                            <a class="btn btn-outline-success" href="{{route('login')}}">{{__('ui.accesso')}}</a>
                            <a class="btn btn-outline-success" href="{{route('register')}}">{{__('ui.registrati')}}</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.chiudi')}}</button>
                        </div>
                    @endif
            </div>
        </div>
    </div>
    </form>
</div>
