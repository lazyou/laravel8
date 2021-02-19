<?php

namespace App\Console\Commands\DesignPatterns;

use App\DesignPatterns\Creational\AbstractFactory\WinWriterFactory;
use Illuminate\Console\Command;

class RunAbstractFactory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:abstract-factory';

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
        $winWriterFactory = new WinWriterFactory();
        $jsonWriter = $winWriterFactory->createJsonWriter();
        $result = $jsonWriter->write([
            'a' => 'a',
            'b' => 'b',
        ], true);

        dd($result);
        return 0;
    }
}
