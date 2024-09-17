<?php

namespace App\Models;

use App\Enums\BlogSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function games() {
        return $this->hasMany(Game::class, 'developer_id');
    }
}
