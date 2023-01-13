<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Setting extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['title', 'content', 'address'];
    protected $fillable = ['logo', 'favicon', 'facebook', 'instagram', 'phone', 'email'];

    public static function checkSetting()
    {
        if(count(Self::all())<1)
        {
            $data = [
                'id'=> 1,
            ];
            foreach(config('app.languages') as $key=>$lang)
            {
                $data[$key]['title'] = $lang;
            }
            Self::create($data);
        }
        return self::first();
    }
}
