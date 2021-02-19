<?php

namespace App\Console\Commands\DesignPatterns;

use App\DesignPatterns\Creational\Pool\WorkerPool;
use Illuminate\Console\Command;

class RunPool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:pool';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $pool = new WorkerPool();
        $work1 = $pool->get();
        $work2 = $pool->get();

        $this->info($pool->count());
        $this->info($work1->run('xxx'));

        $pool->dispose($work1);
        $this->info($pool->count());

        return 0;
    }
}
