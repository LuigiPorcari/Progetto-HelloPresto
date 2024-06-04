<div id="foodboxCreate">
    <form enctype="multipart/form-data" wire:submit.prevent="create">
        @csrf
        <div class="mb-5 mt-2">
            <label for="inputname" class="form-label">{{__('ui.nome')}}</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="inputname" wire:model="name">
            <div class="mt-3">
                @error('name')
                <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="my-5">
            <label for="inputbody" class="form-label">{{__('ui.descrizione')}}</label>
            <textarea name="" id="inputbody" cols="30" rows="10" wire:model="body" class="form-control @error('body')is-invalid @enderror"></textarea>
            <div class="mt-3">
                @error('body')
                <span class="alert alert-danger ">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="my-5">
            <label for="inputprice" class="form-label">{{__('ui.prezzo')}}</label>
            <input type="numeric" class="form-control @error('price')is-invalid @enderror" id="inputprice" wire:model="price">
            <div class="mt-3">
                @error('price')
                <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="my-5">
            <label for="inputcategory" class="form-label">{{__('ui.categoria')}}</label>
            <select wire:model="category_id" id="inputcategory" class="form-control">
                @foreach ($categories as $category)
                    <option value='{{$category->id}}'>{{ __("ui.$category->name") }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-5">
            <input id="imgInput" type="file" wire:model.live="temporary_images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
            @error('temporary_images')
                <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
            <small>{{__('ui.ctrlclick')}}</small>
        </div>
        <div id="uploadSwitch" class="lds-roller d-none"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Preview immagini:</p>
                    <div class="row border border-4 border-success rounded py-4">
                        @foreach ($images as $key => $image)
                            <div class="col-3 d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});">
                                </div>
                                <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{$key}})">X</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <button id="btnInvia" type="submit" class="btn btn-outline-success mt-2">{{__('ui.invia')}}</button>
    </form>
</div>
