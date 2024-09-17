<?php

namespace App\Services;

use App\DTO\DeveloperDto;
use App\Models\Developer;

class DeveloperService
{
    public function store(DeveloperDto $dto)
    {
        return Developer::create([
            'title' => $dto->title,
        ]);
    }
    public function update(Developer $developer, DeveloperDto $dto)
    {
        return tap($developer)->update([
            'title' => $dto->title,
        ]);
    }
}
