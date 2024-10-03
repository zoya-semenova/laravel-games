<?php

namespace App\DTO;

use App\Http\Requests\FilterRequest;
use App\Http\Requests\GameRequest;

class FilterDto
{

    public function __construct(
        public readonly array|null $genres
    )
    {
    }

    public static function fromRequest(FilterRequest $request): FilterDto
    {
        return  new self(
            genres: $request->validated('genres')
        );
    }
}
