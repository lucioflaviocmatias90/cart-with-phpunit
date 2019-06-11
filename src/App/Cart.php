<?php


namespace App;


class Cart
{
    private $products;

    public function add(Product $product, int $qtd) :array
    {
        if (!isset($this->products[$product->getId()]['qtd']))
        {
            $this->products[$product->getId()]['qtd'] = 0;
        }

        $this->products[$product->getId()]['qtd'] += $qtd;
        $this->products[$product->getId()]['product'] = $product;

        return $this->products;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product['qtd'] * $product['product']->getPrice();
        }

        return $total;
    }
}