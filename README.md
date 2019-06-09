Existem 3 tipos de testes automatizados:
 - unitarios
 - integração
 - interface

 composer init (para iniciar o projeto com phpunit)
  - em dependencias vc digita "no"
  - em require-dev vc digita "yes"
  - logo em seguida digite em "phpunit"
 ou senão instale a dependencia depois com  	  	composer require phpunit/phpunit --dev 	


 vendor/bin/phpunit tests/App/ProductTest.php

 video assistido: Aprenda a testar seu software de verdade em 42:15