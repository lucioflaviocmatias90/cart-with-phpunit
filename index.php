<?php 

$product = new Product();
$product->setName = "";
$product->description = "";
$product->price = 0;

$cart = new Cart();
$cart->add($product, 0);

$order = new Order();
$order->setProducts($cart->getProducts());

$paypoom = new PayPoom();

$paymentProcessor = new PaymentProcessor($paypoom);
$paymentProcessor->setOrder($order);
$paymentProcessor->dataCard;

$paymentProcessor->process();


?>