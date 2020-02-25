<?php

namespace App\Jobs;

use App\Player;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Requests;

class ImportFantasyLeaguePlayers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $headers = ['Accept' => 'application/json'];
        $request = Requests::get('https://fantasy.premierleague.com/api/bootstrap-static/', $headers);
        $players = collect(json_decode($request->body)->elements);
        
        try {
            DB::transaction(function () use ($players) {
                Player::truncate();

                $players->each(function ($player) {
                    Player::create([
                        'first_name' => $player->first_name,
                        'second_name' => $player->second_name,
                        'form' => $player->form,
                        'total_points' => $player->total_points,
                        'influence' => $player->influence,
                        'creativity' => $player->creativity,
                        'threat' => $player->threat,
                        'ict_index' => $player->ict_index
                    ]);
                });
            });
        } catch (QueryException $ex) {
            Log::error($ex->getMessage());    
        }
    }
}
