<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;

class Cast extends Model
{
    use HasFactory;

    protected $table = 'casts';
    protected $fillable = [
        'nama',
        'umur',
        'bio'
    ];

    public function film()
    {
        return $this->belongsToMany(Film::class, 'perans' );
    }
}
