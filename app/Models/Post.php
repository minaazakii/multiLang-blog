<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Post extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    public $translatedAttributes = ['title', 'content', 'smallDesc'];
    protected $fillable = ['image', 'category_id',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
