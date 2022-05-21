<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id', 'name', 'brewery', 'style', 'price', 'impressions', 'image', 'bitter', 'sour', 'sweet', 'aftertaste', 'body', 'foam' 
    ];

    public $timestamps = false;
}
