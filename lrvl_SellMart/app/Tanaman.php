<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'tanaman';
    protected $fillable = [
        'nama','deskripsi','harga','stok','foto','created_at'
    ];
}
