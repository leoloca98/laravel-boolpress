<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'slug', 'category_id'];

    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }

    // Definiamo prima la relazione per l'entità debole
    public function category()
    {
        //Non si può importare il modello e passarlo come tale. Serve per forza una stringa
        return $this->belongsTo('App\Models\Category');
    }
}
