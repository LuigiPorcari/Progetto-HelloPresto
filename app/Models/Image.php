<?php

namespace App\Models;

use App\Models\Foodbox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected function casts(): array{
        return [
            'labels' => 'array',
        ];
    }

    protected $fillable = [
        'path' , 'foodbox_id'
    ];

    public function article() : BelongsTo{
        return $this->belongsTo(Foodbox::class);
    }

    public function getUrlByFilePath($filePath, $w = null, $h = null){
        if(!$w && !$h){
            return Storage::url($filePath);
        }
        $path = dirname($filePath);
        $filename = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$filename}";
        return Storage::url($file);
    }

    public function getUrl($w = null, $h = null){
        return self::getUrlByFilePath($this->path, $w, $h);
    }
}
