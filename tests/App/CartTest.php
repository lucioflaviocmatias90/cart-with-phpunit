<?php

namespace Test\App;

use App\Cart;
use App\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testAddProductInTheCart()
    {
        $product = new Product(1, 'Apple Watch', 'Super Relogio Caro', 1000);
        $cart = new Cart();

        $this->assertEquals(2, $cart->add($product, 2)[1]['qtd']);
        $this->assertEquals(4, $cart->add($product, 2)[1]['qtd']);
    }

    public function testIfTheProductsHaveBeenInsertedInTheCart()
    {
        $product = new Product(1, 'Apple Watch', 'Super Relogio Caro', 1000);
        $cart = new Cart();
        $cart->add($product, 2);

        $this->assertEquals(1, sizeof($cart->getProducts()));

        $product1 = $cart->getProducts()[1];
        $product1Qtd = $product1['qtd'];
        $product1Product = $product1['product'];

        $this->assertEquals(2, $product1Qtd);
        $this->assertEquals($product, $product1Product);

        $this->assertEquals(1, sizeof($cart->getProducts()));

    }

    public function testGetTotal()
    {
        $product = new Product(1, 'Apple Watch', 'Super Relogio Caro', 1000);
        $cart = new Cart();
        $cart->add($product, 1);

        $this->assertEquals(1000, $cart->getTotal());
    }
}