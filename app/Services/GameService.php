<?php

namespace App\Services;

use App\DTO\GameDto;
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
}
