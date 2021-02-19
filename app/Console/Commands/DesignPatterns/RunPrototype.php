<?php

namespace App\Console\Commands\DesignPatterns;

use App\DesignPatterns\Creational\Prototype\BarBookPrototype;
use App\DesignPatterns\Creational\Prototype\FooBookPrototype;
use Illuminate\Console\Command;

class RunPrototype extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:prototype';

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
    public function handle(): int
    {
        $barPrototype = new BarBookPrototype();
        $fooPrototype = new FooBookPrototype();

        $barPrototype->setTitle('bar');
        $fooPrototype->setTitle('foo');

        $barPrototypeClone = clone $barPrototype;
        $barPrototypeClone->setTitle('bar clone');

        $this->info($barPrototype->getTitle());
        $this->info($barPrototypeClone->getTitle());

        $this->info($fooPrototype->getTitle());

        return 0;
    }
}
