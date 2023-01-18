<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{

    use HasFactory,Translatable;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['image','parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
