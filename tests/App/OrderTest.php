<?php

namespace Test\App;

/* Nesta Classe foi utilizado o Teste Unitário */

use App\Order;
use App\Product;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testGetTotal()
    {
        // Mock vai simular o objeto $product contendo os métodos getPrice e getId
        $product = $this->getMockBuilder(Product::class)->setMethods(['getPrice', 'getId'])->getMock();

        // Mock vai simular o objeto $product executando o método getPrice, retornando o valor 100
        $product->expects($this->any())->method('getPrice')->will($this->returnValue(100));

        // Mock vai simular o objeto $product executando o método getId, retornando o valor 1
        $product->expects($this->any())->method('getId')->will($this->returnValue(1));

        /*=====================================================================================================*/

        // Criando o Produto2 com Mock utilizando o exemplo acima

        $product2 = $this->getMockBuilder(Product::class)->setMethods(['getPrice', 'getId'])->getMock();

        $product2->expects($this->any())->method('getPrice')->will($this->returnValue(150));

        $product2->expects($this->any())->method('getId')->will($this->returnValue(2));

        /*=====================================================================================================*/

        // Criando um Array de Produtos

        $products[$product->getId()]['product'] = $product;
        $products[$product->getId()]['qtd'] = 1;

        $products[$product2->getId()]['product'] = $product2;
        $products[$product2->getId()]['qtd'] = 2;

        /*=====================================================================================================*/

        // Criando um pedido p/ inserir os produtos

        $order = new Order();
        $order->setProducts($products);

        // Inserindo produtos no pedido
        $total = $order->getTotal();

        // Verificando resultado do teste
        $this->assertEquals(400, $total);
    }
}