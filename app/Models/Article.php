<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' , 'content' , 'photo' , 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function getPhotoUrlAttribute()
    {
        return asset('uploads/' . $this->photo);
    }

}
