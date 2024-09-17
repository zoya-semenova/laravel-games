<?php

namespace App\DTO;

use App\Http\Requests\DeveloperRequest;

class DeveloperDto
{

    public function __construct(
        public readonly string $title,
    )
    {
    }

    public static function fromRequest(DeveloperRequest $request): DeveloperDto
    {
        return  new self(
            title: $request->validated('title'),
        );
    }
}
