<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'developer' => DeveloperResource::make($this->developer),
            'genres' => GenreResource::collection($this->genres)
        ];
    }
}
