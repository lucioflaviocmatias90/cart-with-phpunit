<?php

namespace Test\App;

use \PHPUnit\Framework\TestCase;
use App\Product;

class ProductTest extends TestCase
{
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

	public function getProvider()
	{
		return [
			['Apple Watch', 'Super Relógio Caro', 1000],
			['Xiaomi Watch', 'Super Relógio Barato', 400],
		];
	}

	public function testOneEqualOne()
	{
		$this->assertEquals(1, 1);
	}
}

?>