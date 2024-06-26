<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ally extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url']; 

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
