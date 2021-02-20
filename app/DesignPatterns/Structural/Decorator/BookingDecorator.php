<?php declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator;

/**
 * 装饰者必须实现渲染接口类 Booking 契约，这是该设计模式的关键点。
 * 否则，这将不是一个装饰者而只是一个自欺欺人的包装。
 *
 * Class BookingDecorator
 * @package App\DesignPatterns\Structural\Decorator
 */
abstract class BookingDecorator implements Booking
{
    protected Booking $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}
