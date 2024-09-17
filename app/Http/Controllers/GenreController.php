<?php

namespace App\Http\Controllers;

use App\DTO\GenreDto;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Services\GenreService;

class GenreController extends Controller
{
    public function __construct(
        protected GenreService $service
    )
    {}
    public function store(GenreRequest $request): GenreResource
    {
        $genre = $this->service->store(
            GenreDto::fromRequest($request),
        );

        return GenreResource::make($genre);
    }

    public function update(GenreRequest $request, Genre $genre): GenreResource
    {
        $genre = $this->service->update(
            $genre,
            GenreDto::fromRequest($request),
        );

        return GenreResource::make($genre);
    }
}
