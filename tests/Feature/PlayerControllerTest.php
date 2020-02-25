<?php

namespace Tests\Feature;

use App\Player;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery;
use Tests\TestCase;

class PlayerControllerTest extends TestCase
{
    public function testControllerIndexItShouldReturnPlayerData()
    {
        $this->mock(Player::class, function ($mock) {
            $mock->expects()
                ->all(['id', 'first_name', 'second_name'])
                ->andReturn(new Player);
        });

        $this->getJson('/api/player');
    }

    public function testControllerShowItShouldReturnSpecificPlayer()
    {
        $this->mock(Player::class, function ($mock) {
            $mock->expects()
                 ->findOrFail(1)
                 ->andReturn(new Player);
        });

        $this->get('/api/player/1');
    }

    public function testControllerShowItShouldThrowModelNotFoundException()
    {
        $this->mock(Player::class, function ($mock) {
            $mock->expects()
                 ->findOrFail('asda')
                 ->andThrow(new ModelNotFoundException);
        });


        $this->get('/api/player/asda');
    }
}
