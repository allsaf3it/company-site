<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ExpirationPlan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:plan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change user plan_id from plan_number to 0 after end plan date and check it every day';

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
     * @return int
     */
    public function handle()
    {
        $users = User::whereDate('end_plan', '<', Carbon::now()->format('Y-m-d'))->get(); 
        foreach($users as $user){
            $user->update(['plan_id' => null]);
            $data = [
                'shutdown' => 0,
                'userid' => $user->id
            ];
            
            // $jsonData = json_encode($data);
            // Send a POST request to the API endpoint with JSON data
            Http::post('http://18.133.74.33:80/shutdown', [
                'headers' => [
                    'Content-Type' => 'application/json', // Set the content type to JSON
                ],
                'body' => $data, // Send JSON data in the body
                // You can also set headers, authentication, etc. here
            ]);
            // send api
        }
    }
}
