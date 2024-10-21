<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:withdraw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change user Withdraw from 1 to 0 every day to can use withdraw again';

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
        $users = User::get(); 
        foreach($users as $user){
            $user->update(['withdraw_status' => 0]);
        }
    }
}
