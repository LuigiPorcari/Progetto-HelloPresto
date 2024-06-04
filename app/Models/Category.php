<?php

namespace App\Models;

use App\Models\Foodbox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = ['name'];

    use HasFactory;
    public function foodboxes(){
        return $this->hasMany(Foodbox::class);
    }
}
