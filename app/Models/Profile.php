<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        'umur',
        'bio',
        'alamat',
        'user_id',
    ];


    public function profile()
    {
        return $this->hasOne(user::class, 'id', 'user_id');
    }
}
