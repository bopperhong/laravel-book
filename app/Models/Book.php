<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'description', 'price', 'category_id', 'cover_image', 'seller'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
