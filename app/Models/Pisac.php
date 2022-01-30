<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pisac extends Model
{
    use HasFactory;

    protected $fillable = [
        'ime',
        'prezime',
        'godinaRodjenja'
        
    ];


    public function knjige(){
        return $this->hasMany(Knjiga::class);
    }
}
