<?php

namespace App\DTO;

use App\Http\Requests\GameRequest;

class GameDto
{

    public function __construct(
        public readonly string $title,
        public readonly int $developer,
        public readonly array $genres
    )
    {
    }

    public static function fromRequest(GameRequest $request): GameDto
    {
        return  new self(
            title: $request->validated('title'),
            developer: $request->validated('developer'),
            genres: $request->validated('genres')
        );
    }
}
