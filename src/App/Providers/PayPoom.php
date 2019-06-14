<?php


namespace App\Providers;


use App\Order;

class PayPoom implements PaymentProviderInterface
{

    public function process(Order $order, $holder, $number, $expiration, $cvv)
    {
        if ($order->getTotal() % 2)
        {
            return "Declined";
        }

        return "Approved";
    }
}