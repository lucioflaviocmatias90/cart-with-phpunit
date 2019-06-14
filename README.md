###Aplicação simples orientado a testes utilizando PHPUnit

Existem 3 tipos de testes automatizados:
 - unitários
 - integração
 - interface

 Para iniciar o projeto, digite: _composer init_
  1. em dependências vc digita "_no_"
  2. em require-dev vc digita "_yes_"
  3. logo em seguida digite em "*_phpunit_*"
 ou senão instale a dependência depois com _composer require phpunit/phpunit --dev_
 
 Para executar os testes nas classes na pasta _tests/ClassNameTest_, digite:

 - _vendor/bin/phpunit tests/App/ClassNameTest.php_
 
 **Testes Unitários** são testes realizados em uma Classe específica mesmo que nela haja alguma dependência 
 de outra Classe em algum determinado momento. A intenção é testar a unidade, e para "mascarar" essa 
 dependência é utilizado modelos, dublês ou os famosos Mocks, então o PHPUnit cria uma classe dublê, fingindo
 ser a Classe Dependente.
 
 **Testes de Integração** são testes realizados em uma Classe específica que depende de uma outra Classe para 
 realizar os testes. Se a Classe Dependente não está com a sintaxe de código correta e bem definida, então haverá falhas no testes.
 
 Em nossos testes iremos executar cada Classe como está descrito abaixo com o comando: _vendor/bin/phpunit tests/App/ClassNameTest.php_

 
```
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
 ```
 video assistido: **Aprenda a testar seu software de verdade** em _1:42:18_
  
  https://www.youtube.com/watch?v=ld2eC2DBrk0&t=2547s