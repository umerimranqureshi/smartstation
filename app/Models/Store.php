<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Store extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'stores.description'  => 10,
        ]
    ];

    protected $fillable=[
      'email','category','hours','description','name','phone','latitude','longitude','store_id'
    ];
}
