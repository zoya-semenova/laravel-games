<?php

namespace App\Services;

use App\DTO\FilterDto;
use App\DTO\GameDto;
use App\Http\Filters\PostFilter;
use App\Models\Game;

class GameService
{
    public function store(GameDto $dto)
    {
        $game = Game::create([
            'title' => $dto->title,
            'developer_id' => $dto->developer
        ]);
        $game->genres()->attach($dto->genres);

        return $game;
    }
    public function update(Game $game, GameDto $dto)
    {
        $game = tap($game)->update([
            'title' => $dto->title,
            'developer_id' => $dto->developer
        ]);

        $game->genres()->sync($dto->genres);

        return $game;
    }

    public function destroy(Game $game)
    {
        $game->genres()->detach();
        $game->delete();
    }

    public function filter(FilterDto $dto)
    {
        if (!empty($dto->genres)) {
            $games = Game::whereHas('genres', function($q) use($dto)
            {
                $q->whereIn('id', $dto->genres);
            })->get();

            return $games;
        }

        return Game::all();
    }
}
