<?php


namespace App\Providers;


use App\Order;

interface PaymentProviderInterface
{
    public function process(Order $order, $holder, $number, $expiration, $cvv);

}