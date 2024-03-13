<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;


class Chirp extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'likes',    // Nuevo atributo para contar los likes
        'dislikes', // Nuevo atributo para contar los dislikes
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
