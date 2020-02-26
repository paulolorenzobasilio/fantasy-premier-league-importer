<?php

namespace App\Console\Commands;

use App\Jobs\ImportFantasyLeaguePlayers;
use Illuminate\Console\Command;

class ImportFantasyLeaguePlayerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:fantasy-league';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import fantasty league players';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Successfully dispatch job for importing fantasy league players');
        ImportFantasyLeaguePlayers::dispatchNow();
    }
}
