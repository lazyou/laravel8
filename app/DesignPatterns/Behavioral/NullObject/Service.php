<?php declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\NullObject;

class Service
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * do something ...
     */
    public function doSomething()
    {
        // notice here that you don't have to check if the logger is set with eg. is_null(), instead just use it
        // 请注意，您不必检查记录器是否设置了, 例如 `is_null()`，而是直接使用它 -- TODO: 感觉也没啥啊， 这个方法本来就存在当然可以直接调用。。。
        $this->logger->log('We are in '.__METHOD__);
    }
}
