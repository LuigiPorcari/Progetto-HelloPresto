<div>
    <div class="col-4 ">
        <div class="card" style="width: 18rem;">
            <img src="https://picsum.photos/200/300" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{__('ui.nome')}}{{$foodbox->name}}</h5>
                <p class="card-text">{{__('ui.prezzo')}}{{$foodbox->price}}</p>
                <a href="#">{{__('ui.categoria')}}{{$foodbox->category->name}}</a>
                <p>{{__('ui.descrizione')}} {{$foodbox->body}}</p>
                <a href="#" class="btn btn-primary">{{__('ui.dettaglio')}}</a>
            </div>
        </div>
    </div>
</div>
