<?php

namespace Test\App;

/*
    Na classe CartTest foi utilizado o Teste Integrado, observamos que foi necessário a utilização
    da classe Product para criar os produtos com suas informações individuais e inserir no carrinho
    para realizar os testes abaixo.
*/

use App\Cart;
use App\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    /* Esse método é para testar a quantidade de itens adicionado no carrinho */
    public function testAddProductInTheCart()
    {
        // Criando novo produto
        $product = new Product(1, 'Apple Watch', 'Super Relogio Caro', 1000);

        // Criando carrinho de produtos
        $cart = new Cart();

        // Comparando quantidade de produtos inserido no carrinho
        $this->assertEquals(2, $cart->add($product, 2)[1]['qtd']);

        // Comparando quantidade de produtos inserido no carrinho
        $this->assertEquals(4, $cart->add($product, 2)[1]['qtd']);
    }

    public function testIfTheProductsHaveBeenInsertedInTheCart()
    {
        // Criando novo produto
        $product = new Product(1, 'Apple Watch', 'Super Relogio Caro', 1000);

        // Criando carrinho de produtos
        $cart = new Cart();

        // Adicionando produto e a quantidade do produto no carrinho
        $cart->add($product, 2);

        // Comparando quantidade de produtos no carrinho
        $this->assertEquals(1, sizeof($cart->getProducts()));

        // Recuperando informações do produto inserido no carrinho
        $product1 = $cart->getProducts()[1];
        $product1Qtd = $product1['qtd'];
        $product1Product = $product1['product'];

        // Comparando informações do produto do carrinho
        $this->assertEquals(2, $product1Qtd);
        $this->assertEquals($product, $product1Product);
        $this->assertEquals(1, sizeof($cart->getProducts()));
    }

    /* Esse método é para testar o preço total de produtos inserido no carrinho */
    public function testGetTotal()
    {
        // Criando um novo produto
        $product = new Product(1, 'Apple Watch', 'Super Relogio Caro', 1000);

        // Criando o carrinho de produtos
        $cart = new Cart();

        // Adicionando produto e a quantidade do produto no carrinho
        $cart->add($product, 1);

        // Comparando o preço total de produtos no carrinho
        $this->assertEquals(1000, $cart->getTotal());

        // Criando um outro produto
        $product = new Product(2, 'Xiaomi Watch', 'Super Relogio Barato', 400);

        // Adicionando o segundo produto e a quantidade do segundo produto no carrinho
        $cart->add($product, 1);

        // Comparando o preço total de produtos no carrinho
        $this->assertEquals(1400, $cart->getTotal());
    }
}