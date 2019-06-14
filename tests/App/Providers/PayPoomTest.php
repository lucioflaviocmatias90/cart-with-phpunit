<?php


namespace Test\App\Providers;


use App\Order;
use App\Providers\PayPoom;
use PHPUnit\Framework\TestCase;

class PayPoomTest extends TestCase
{
    public function testProcessPayment()
    {
        $order = $this->getMockBuilder(Order::class)->setMethods(['getTotal'])->getMock();
        $order->expects($this->any())->method('getTotal')->will($this->returnValue(100));

        /*===============================================================================================*/

        $provider = new PayPoom();
        $result = $provider->process($order, 'LUCIO FLAVIO', '00124222', '10/29', '123');
        $this->assertEquals('Approved', $result);

        /*===============================================================================================*/

        $order2 = $this->getMockBuilder(Order::class)->setMethods(['getTotal'])->getMock();
        $order2->expects($this->any())->method('getTotal')->will($this->returnValue(101));

        $result = $provider->process($order2, 'LUCIO FLAVIO', '00124222', '10/29', '123');
        $this->assertEquals('Declined', $result);
    }
}