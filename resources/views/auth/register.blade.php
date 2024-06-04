<x-layout documentTitle="Registrati">
    <div class="container-fluid bg-header mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center shadow">
                <h1 class="display-1 mb-5 mt-5 font-p p-welcome ">{{__('ui.registrati')}}</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-12 border shadow m-5 p-2 p-md-5 rounded-4 bg-form-card">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.username')}}</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.Email')}}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.password')}}</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.conferma')}}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-outline-success ms-auto">{{__('ui.registrati')}}</button>
                    <p class="mt-3">{{__('ui.seiregistrato')}}</p>
                    <a class="btn btn-outline-success" href="{{route('login')}}">{{__('ui.accesso')}}</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>