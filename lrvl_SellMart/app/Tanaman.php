<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name','deskripsi','price','stok','photo','created_at','updated_at'
    ];
}
