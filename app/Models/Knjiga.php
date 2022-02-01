<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;

    protected $fillable = [
        'naslov',
        'izdavac',
        'ISBN'
    ];

    public function pisac(){
        return $this->belongsTo(Pisac::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kategorija(){
        return $this->belongsTo(Kategorija::class);
    }
}
