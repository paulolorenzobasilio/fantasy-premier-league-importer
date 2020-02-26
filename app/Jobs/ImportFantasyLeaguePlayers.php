<?php

namespace App\Jobs;

use App\Contracts\Parser\ParserFactory;
use App\Player;
use Exception;
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
        $request = Requests::get(
            'https://fantasy.premierleague.com/api/bootstrap-static/',
            $headers
        );
        $importer = ParserFactory::getParserType($request->body);
        $data = $importer->parse();

        try {
            DB::transaction(function () use ($data) {
                Player::truncate();
                Player::insert($data);
            });
        } catch (QueryException $ex) {
            Log::error($ex->getMessage());
        }
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        Log::error($exception->getMessage());
    }
}
