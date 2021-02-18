<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
    protected $dateFormat = 'U';
    const CREATED_AT = 'datetime';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'category',
        'description',
        'datetime',
    ];

}
