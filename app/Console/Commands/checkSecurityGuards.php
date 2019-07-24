<?php

namespace App\Console\Commands;

use App\Branch;
use App\Schedule;
use App\Session;
use Carbon\Carbon;
use Illuminate\Console\Command;

class checkSecurityGuards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-guard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking Security Guards';

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
        $now = Carbon::now();
        Session::where('from', '>', $now->timestamp)
            ->where('to', '<', $now->timestamp)
            ->each(function (Session $session) use ($now) {
                $session->schedules()->each(function (Schedule $schedule) use ($now) {
                    $schedule->branch()->each(function(Branch $branch) use($schedule){
                        $earliestTime = $schedule->period - $schedule->tolerance; //createDateTime
                        $latestTime = $schedule->period + $schedule->tolerance; //createDateTime
                        $buttonClicks = $branch->buttonClicks()
                            ->where('created_at', '>', $earliestTime)
                            ->where('created_at', '<', $latestTime)
                            ->get();

//                        $clickedButtons = $buttonClicks->button
//                        $allButtons = $branch->buttons();

                    });
                });
            });
    }
}
