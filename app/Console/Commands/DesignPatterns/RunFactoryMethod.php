<?php

namespace App\Console\Commands\DesignPatterns;

use App\DesignPatterns\Creational\FactoryMethod\FileLogger;
use App\DesignPatterns\Creational\FactoryMethod\FileLoggerFactory;
use Illuminate\Console\Command;

class RunFactoryMethod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:factory-method';

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
        $filePath = storage_path('factory-method.log');

        $fileLogFactory = new FileLoggerFactory($filePath);
        $fileLog = $fileLogFactory->createLogger();
        $fileLog->log('xxx');

        $fileLogOther = new FileLogger($filePath);
        $fileLogOther->log('yyy');

        return 0;
    }
}
