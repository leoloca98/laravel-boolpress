<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'color'];

    //Per secondo definiamo la relazione per l'entità dominante
    //$category->posts

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
