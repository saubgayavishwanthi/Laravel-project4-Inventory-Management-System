<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['image','name', 'quantity', 'price','description'];
}
