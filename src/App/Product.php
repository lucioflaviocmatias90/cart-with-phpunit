<?php 

namespace App;

class Product
{
	private $id;
	private $name;
	private $description;
	private $price;

	public function __construct(int $id = null, string $name, string $description = null, float $price = 0.00)
	{
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}
}

?>