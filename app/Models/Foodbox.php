<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foodbox extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name' , 'price' , 'body' , 'user_id' , 'category_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function toBeRevisedCount(){
        return Foodbox::where('is_accepted', null)->count();
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public function toSearchableArray(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }

    public function images() : HasMany{
        return $this->hasMany(Image::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
