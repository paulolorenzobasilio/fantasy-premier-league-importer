<?php

namespace Tests\Feature;

use App\Player;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class PlayerControllerTest extends TestCase
{
    public function testControllerIndexItShouldReturnPlayerData()
    {
        $this->mock(Player::class, function ($mock) {
            $mock->shouldReceive('all')->once();
        });
        $this->get('/api/player');
    }

    public function testControllerShowItShouldReturnSpecificPlayer()
    {
        $this->mock(Player::class, function ($mock) {
            $mock->shouldReceive('findOrFail')->once();
        });
        $this->get('/api/player/1');
    }

    public function testControllerShowItShouldReturnNotFoudnPage()
    {
        $this->mock(Player::class, function ($mock) {
            $mock->shouldReceive('findOrFail')
                 ->andReturn(new ModelNotFoundException)
                 ->once();
        });
        $this->get('/api/player/1');
    }
}
