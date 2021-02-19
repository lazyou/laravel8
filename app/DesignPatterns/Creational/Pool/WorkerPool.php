<?php declare(strict_types=1);

namespace App\DesignPatterns\Creational\Pool;

use Countable;

/**
 * TODO： 显然这个Pool很简易，没有预先生成池子，没有数量限制
 * Class WorkerPool
 * @package App\DesignPatterns\Creational\Pool
 */
class WorkerPool implements Countable
{
    /**
     * 占用Worker
     * @var StringReverseWorker[]
     */
    private array $occupiedWorkers = [];

    /**
     * 空闲Worker
     * @var StringReverseWorker[]
     */
    private array $freeWorkers = [];

    /**
     * 从Pool获取对象
     * @return StringReverseWorker
     */
    public function get(): StringReverseWorker
    {
        // 有空闲对象则优先使用，否则新建
        if (count($this->freeWorkers) == 0) {
            $worker = new StringReverseWorker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }

        $this->occupiedWorkers[spl_object_hash($worker)] = $worker;

        return $worker;
    }

    /**
     * 从Pool删除对象
     * @param StringReverseWorker $worker
     */
    public function dispose(StringReverseWorker $worker)
    {
        $key = spl_object_hash($worker);

        if (isset($this->occupiedWorkers[$key])) {
            unset($this->occupiedWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

    public function count(): int
    {
        return count($this->occupiedWorkers) + count($this->freeWorkers);
    }
}
