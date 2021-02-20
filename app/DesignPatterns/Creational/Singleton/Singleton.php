<?php declare(strict_types=1);

namespace App\DesignPatterns\Creational\Singleton;

final class Singleton
{
    private static ?Singleton $instance = null;

    /**
     * gets the instance via lazy initialization (created on first usage)
     * 通过延迟初始化获取实例（首次使用时创建）
     */
    public static function getInstance(): Singleton
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     * 不允许从外部调用，以防止创建多个实例，
     * 要使用单例，您必须从 Singleton :: getInstance（） 获取实例
     */
    private function __construct()
    {
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     * 防止实例被克隆（这将创建它的第二个实例）
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     * 防止被反序列化（这将创建它的第二个实例）
     */
    private function __wakeup()
    {
    }
}
