<?php

namespace App\Http\Controllers;

use App\DTO\DeveloperDto;
use App\Http\Requests\DeveloperRequest;
use App\Http\Resources\DeveloperResource;
use App\Models\Developer;
use App\Services\DeveloperService;

class DeveloperController extends Controller
{
    public function __construct(
        protected DeveloperService $service
    )
    {}
    public function store(DeveloperRequest $request): DeveloperResource
    {
        $developer = $this->service->store(
            DeveloperDto::fromRequest($request),
        );

        return DeveloperResource::make($developer);
    }

    public function update(DeveloperRequest $request, Developer $developer): DeveloperResource
    {
        $developer = $this->service->update(
            $developer,
            DeveloperDto::fromRequest($request),
        );

        return DeveloperResource::make($developer);
    }
}
