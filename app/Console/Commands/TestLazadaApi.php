<?php

namespace App\Console\Commands;

use App\Libs\LazopSdk\Lazop\LazopClient;
use App\Libs\LazopSdk\Lazop\LazopRequest;
use Illuminate\Console\Command;

class TestLazadaApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:lazada';

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
        $c = new LazopClient('https://api.lazada.sg/rest', '${appKey}', '${appSecret}');
        $request = new LazopRequest('/seller/get', 'GET');
        $request->addApiParam('api_id',1);
        $request->addHttpHeaderParam('cx','test');
        $c->execute($request);

        return 0;
    }
}
