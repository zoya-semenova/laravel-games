<?php

namespace App\Services;

use App\DTO\GenreDto;
use App\Models\Genre;

class GenreService
{
    public function store(GenreDto $dto)
    {
        return Genre::create([
            'title' => $dto->title,
        ]);
    }
    public function update(Genre $genre, GenreDto $dto)
    {
        return tap($genre)->update([
            'title' => $dto->title,
        ]);
    }
}
