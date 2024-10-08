<?php

namespace App\Models;

use App\Enums\BlogSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class);
    }
}
