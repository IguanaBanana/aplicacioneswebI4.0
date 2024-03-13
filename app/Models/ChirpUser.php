<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChirpUser extends Model
{
    use HasFactory;
 
    protected $table = 'chirp_user';

    protected $fillable = [
        'user_id',
        'chirp_id',
        'like', // Puedes agregar más campos si es necesario, como 'dislike', 'favorite', etc.
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chirp()
    {
        return $this->belongsTo(Chirp::class);
    }
}
