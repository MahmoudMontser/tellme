<?php

namespace App\Console\Commands;

use App\Task;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class checkTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:expired-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change-expired-tasks-status';

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

        Task::whereDate('due_time', '<', Carbon::now())->where('status','!=','Done')->update(['Status' => 'Expired']);


    }
}
