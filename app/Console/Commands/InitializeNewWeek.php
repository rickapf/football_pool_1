<?php

namespace App\Console\Commands;

use App\Models\Team;
use GuzzleHttp\Client;
use App\Models\Setting;
use App\Models\Schedule;
use Illuminate\Console\Command;
use GuzzleHttp\Exception\TransferException;

class InitializeNewWeek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pool:new-week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize new week';


    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    protected $apiConfig;


    /**
     * InitializeNewWeek constructor.
     */
    public function __construct()
    {
        $this->apiConfig = config('pool.profootballapi');

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $week  = Setting::newWeek();
        $games = $this->getGames($week);

        $games->each(function ($item, $key) use ($week) {
            Schedule::updateOrCreate(
                [
                    'week'      => $week,
                    'home_team' => Team::idByAbbreviation($item->home),
                    'away_team' => Team::idByAbbreviation($item->away)
                ],
                [
                    'number' => $key + 1,
                    'when'   => $item->time
                ]
            );
        });
    }


    /**
     * @param $week
     *
     * @return \Illuminate\Support\Collection
     */
    private function getGames($week)
    {
        try {

            $client = new Client(['base_uri' => $this->apiConfig['base_url']]);

            $response = $client->request('POST', 'schedule', [
                'query' => [
                    'api_key'     => $this->apiConfig['key'],
                    'year'        => $this->apiConfig['year'],
                    'week'        => $week,
                    'season_type' => $this->apiConfig['season_type']
                ]
            ]);

            $responseBody = $response->getBody();

            $games = $responseBody->getContents();
            $games = collect(json_decode($games));
            $games = $games->sortBy('time');

            return $games->values();

        } catch (TransferException $e) {

            $this->error($e->getMessage());

        }
    }
}
