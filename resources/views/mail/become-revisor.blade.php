<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelloPresto.it</title>
    {{-- LINK BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <h1>Un utente ha chiesto di diventare foodbox revisor!</h1>
                <h2>Ecco il suo profilo:</h2>
                <p>Nome: {{$content['name']}} </p>
                <p>Email: {{$content['email']}} </p>
                <p>Messaggio: {{$content['message']}}</p>
                <p>Per confermare la candidatura, premi qui!</p>
                <a href="{{route('make.revisor', compact('user'))}}">Conferma candidatura</a>
            </div>
        </div>
    </div>
    {{-- SCRIPT BOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>