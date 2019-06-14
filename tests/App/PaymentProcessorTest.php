<?php

namespace Test\App;

/* Nesta Classe foi utilizado o Teste Unitário */

use App\Order;
use App\PaymentProcessor;
use App\Providers\PayPoom;
use PHPUnit\Framework\TestCase;

class PaymentProcessorTest extends TestCase
{
    public function testProcessPaymentWhenItsApproved()
    {
        $order = $this->getMockBuilder(Order::class)->setMethods(['getTotal', 'getStatus'])->getMock();

        $order->expects($this->any())->method('getTotal')->will($this->returnValue(100));

        $order->expects($this->any())->method('getStatus')->will($this->returnValue('Approved'));

        /*======================================================================================================*/

        $paypoom = $this->getMockBuilder(PayPoom::class)->setMethods(['process'])->getMock();

        $paypoom->expects($this->any())->method('process')->will($this->returnValue('Approved'));

        /*======================================================================================================*/

        $paymentProcessor = new PaymentProcessor($paypoom);
        $paymentProcessor->setOrder($order);
        $paymentProcessor->setCreditCardHolder('LUCIO FLAVIO');
        $paymentProcessor->setCreditCardNumber('400000111111');
        $paymentProcessor->setCreditCardExpirationDate('10/29');
        $paymentProcessor->setCreditCardCVV('123');

        $result = $paymentProcessor->process();

        /*======================================================================================================*/

        $this->assertEquals('Approved', $result->getStatus());
        $this->assertEquals('Approved', $result->getOrder()->getStatus());
    }
}