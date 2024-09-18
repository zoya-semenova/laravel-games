<?php

namespace App\Http\Controllers;

use App\DTO\GameDto;
use App\Http\Filters\PostFilter;
use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GameController extends Controller
{
    public function __construct(
        protected GameService $service
    )
    {
    }
    public function store(GameRequest $request): GameResource
    {
        $game = $this->service->store(
            GameDto::fromRequest($request),
        );

        return GameResource::make($game);
    }

    public function update(GameRequest $request, Game $game): GameResource
    {
        $game = $this->service->update(
            $game,
            GameDto::fromRequest($request),
        );

        return GameResource::make($game);
    }

    public function destroy(Game $game): JsonResponse
    {
        $this->service->destroy($game);

        return response()->json(['message'=>'Success']);
    }

    public function filter(PostFilter $filter): ResourceCollection
    {
        $games = Game::with('genres', 'developer')->filter($filter)->get();

        return GameResource::collection($games);
    }
}
