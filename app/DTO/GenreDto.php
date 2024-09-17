<?php

namespace App\DTO;

use App\Http\Requests\GenreRequest;

class GenreDto
{

    public function __construct(
        public readonly string $title,
    )
    {
    }

    public static function fromRequest(GenreRequest $request): GenreDto
    {
        return  new self(
            title: $request->validated('title'),
        );
    }
}
