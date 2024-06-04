<x-layout documentTitle="Accedi">
    <div class="container-fluid bg-header mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center shadow">
                <h1 class="display-1 mb-5 mt-5 font-p p-welcome ">{{__('ui.accesso')}}</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-12  border shadow m-5 p-2 p-md-5 rounded-4 bg-form-card">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.Email')}}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.password')}}</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-outline-success">{{__('ui.accesso')}}</button>
                    <p class="mt-3">{{__('ui.GiàRegistrato')}}</p>
                    <a class="btn btn-outline-success" href="{{route('register')}}">{{__('ui.registrati')}}</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>