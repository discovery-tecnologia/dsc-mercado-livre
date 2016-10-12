# dsc-mercado-livre - Biblioteca de integração com o Mercado Livre

Master:
[![Build Status](https://travis-ci.org/discovery-tecnologia/dsc-mercado-livre.svg?branch=master)](http://travis-ci.org/#!/discovery-tecnologia/dsc-mercado-livre)

Develop:
[![Build Status](https://travis-ci.org/discovery-tecnologia/dsc-mercado-livre.svg?branch=develop)](http://travis-ci.org/#!/discovery-tecnologia/dsc-mercado-livre)

Biblioteca de integração com a API do Mercado Livre.

### Funcionalidades

- Autenticação e Autorização
- Consulta dos dados do usuário
- Consulta de categorias
- Consulta de moedas
- Consulta e cadastro de produtos
- Consulta de pedidos

### Requisitos

- PHP 5.6+
- Autoloader compatível com a PSR-4

### Dependências

- Guzzle
- JMS Serializer
- Doctrine Collections
- Doctrine Cache

### Testes
Para rodar os testes, você pode usar o [composer](https://getcomposer.org/download/):
```composer
composer test
```
ou utilizando o .phar
```composer
php composer.phar test
```

**OBS:** Esta biblioteca está em fase de desenvolvimento

### Utilização
Para utilizar esta biblioteca, primeiramente você deve ter uma [aplicação](http://applications.mercadolibre.com/) configurada no Mercado Livre. 
Caso não esteja habituado com estas funcionalidades, você pode conferir no [Getting Started](http://developers.mercadolibre.com/getting-started/) 
da página do manual do desenvolvedor.  

Após a criação da aplicação você terá as informações do **App ID (client-id)** e **Secret Key (client-secret)** disponibilizados pelo Mercado Livre. Estas informações
serão utilizadas quando você acessar algum recurso que necessita de autorização. 

##### Recursos públicos
O Mercado Livre disponibiliza algumas consultas públicas, portanto, não é necessário passar o seu **App ID** e **Secret Key** 

##### Exemplos de consultas públicas

- Consulta de categorias
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Requests\Category\CategoryService;
use Dsc\MercadoLivre\Environments\Site;

$service = new CategoryService();

// Consulta uma categoria específica
$category = $service->findCategory('MLA5725');

// Consulta a lista de categorias de uma determinada região (Site ID)
$categories = $service->findCategories(Site::BRASIL);

// Consulta os atributos de uma determinada categoria
$attributes = $service->findCategoryAttributes('MLA5725');

```

- Consulta de moedas
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Requests\Currency\CurrencyService;

$service = new CurrencyService();

// Consulta uma moeda específica
$currency = $service->findCurrency('ARS');

// Consulta a lista de moedas e seus atributos
$currencies = $service->findCurrencies();

```

##### Recursos privados



### Licença

Esta biblioteca segue os termos de uso da [Apache-2.0](https://github.com/discovery-tecnologia/dsc-mercado-livre/blob/master/LICENSE)
