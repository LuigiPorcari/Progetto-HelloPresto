<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Foodbox;
use Livewire\Component;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BoxCreate extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $body;
    public $img;
    public $category_id;
    #[Validate('required|numeric')]
    public $price;
    public $images = [];
    public $temporary_images;

    public function messages(){ 
        return[
        'name.required' => __('ui.camporichiesto'),
        'body.required' => __('ui.camporichiesto'),
        'price.required' => __('ui.camporichiesto'),
        'price.numeric' => __('ui.camporichiestonumero'),
        ];}
    public function create(){
        // dd($this->category_id);
        $this->validate();
        $this->foodbox = Foodbox::create([
            'name' => $this->name,
            'body' => $this->body,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'user_id' => Auth::user()->id,
        ]);
        if(count($this->images)  > 0){
            foreach ($this->images as $image) {
                $newFileName = "foodboxes/{$this->foodbox->id}";
                $newImage = $this->foodbox->images()->create(['path' => $image->store($newFileName , 'public')]);
                // dispatch(new ResizeImage($newImage->path, 500, 500));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 500 , 500),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->reset();
        // $this->images = [];
        session()->flash('status', __('ui.foodboxaggiunta'));
        return $this->redirect(route('home'));
    }
    public function render()
    {
        return view('livewire.box-create');
    }

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key , array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
}
