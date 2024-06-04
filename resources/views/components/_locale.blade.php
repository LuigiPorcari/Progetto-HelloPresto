<form class="d-inline" action="{{route('setLocale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn d-flex align-items-center">
        <img src="{{asset('vendor/blade-flags/language-'. $lang . '.svg')}}" width="32" height="32" />
        <p class="ms-4 mt-3">{{$language}}</p>
    </button>
</form>