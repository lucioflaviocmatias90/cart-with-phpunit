<?php

namespace Test\App;

use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
	/**
	* @dataProvider getSetProvider
	*/
	public function testGetterAndSetterName($name, $description, $price)
	{
		$product = new Product();

		$this->assertEquals($product, $product->setName($name));
		$this->assertEquals($name, $product->getName());

		$this->assertEquals($product, $product->setDescription($description));
		$this->assertEquals($description, $product->getDescription());

		$this->assertEquals($product, $product->setPrice($price));
		$this->assertEquals($price, $product->getPrice());
	}

	public function getSetProvider()
	{
		return [
			['Apple Watch', 'Super Relógio Caro', 1000],
			['Xiaomi Watch', 'Super Relógio Barato', 400]
		];
	}

	public function testOneEqualOne()
	{
		$this->assertEquals(1, 1);
	}
}