<?php

namespace App\Http\Controllers;

use App\Player;

class PlayerController extends Controller
{
    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = $this->player->all(['id', 'first_name', 'second_name'])
            ->each
            ->append('full_name')
            ->makeHidden(['first_name', 'second_name']);

        return response()->json($players);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = $this->player->findOrFail($id);
        return response()->json($player);
    }
}
