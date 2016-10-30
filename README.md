# dsc-mercado-livre - Biblioteca de integração com o Mercado Livre

Master:
[![Build Status](https://travis-ci.org/discovery-tecnologia/dsc-mercado-livre.svg?branch=master)](http://travis-ci.org/#!/discovery-tecnologia/dsc-mercado-livre)

Develop:
[![Build Status](https://travis-ci.org/discovery-tecnologia/dsc-mercado-livre.svg?branch=develop)](http://travis-ci.org/#!/discovery-tecnologia/dsc-mercado-livre)

Biblioteca de integração com a API do Mercado Livre.

**OBS: Esta biblioteca ainda está em fase de desenvolvimento! Contribua!!**

> ### Funcionalidades

- Autenticação e Autorização
- Consulta dos dados do usuário
- Consulta de categorias
- Consulta de moedas
- Consulta e cadastro de produtos
- Consulta de pedidos

> ### Requisitos

- PHP 5.6+
- Autoloader compatível com a PSR-4

> ### Dependências

- Guzzle
- JMS Serializer
- Doctrine Collections
- Doctrine Cache

> ### Instalação

Para instalar a biblioteca basta adicioná-la via [composer](https://getcomposer.org/download/)

```composer
composer require dsc/mercado-livre:0.0.9-rc
```

Ou no composer.json

```json
{
    "dsc/mercado-livre": "0.0.9-rc"
}
```

> ### Testes

Podemos usar o composer para rodar os testes:

```composer
composer test
```
ou utilizando o .phar

```composer
php composer.phar test
```

> ### Utilização

Para utilizar esta biblioteca, primeiramente você deve ter uma [aplicação](http://applications.mercadolibre.com/) configurada no Mercado Livre. 
Caso não esteja habituado com estas funcionalidades, você pode conferir no [Getting Started](http://developers.mercadolibre.com/getting-started/) 
da página do manual do desenvolvedor.  

Após a criação da aplicação você terá as informações do **App ID (client-id)** e **Secret Key (client-secret)** disponibilizados pelo Mercado Livre. Estas informações
serão utilizadas quando você acessar algum recurso que necessita de autorização. 

Atualmente o Mercado Livre não possui um ambiente de `Sandbox` para realização de testes. Todas as publicações serão executadas na sua conta real, conforme
descrito no [manual](http://developers.mercadolibre.com/start-testing/). 

Você também pode criar um [usuário de teste](http://developers.mercadolibre.com/start-testing/#Create-a-test-user) se achar necessário.
Com o usuário de teste criado, é possível configurar outra aplicação e ter a **App ID (client-id)** e **Secret Key (client-secret)** para o usuário de teste.
Lembrando novamente que mesmo com o usuário de teste, os dados aparecerão no ambiente de **produção** do Mercado Livre.

> ##### Exemplo de autenticação e autorização

No manual do desenvolvedor você encontra mais detalhes sobre o fluxo de como funciona a 
[autenticação e autorização server side](http://developers.mercadolibre.com/server-side/) do Mercado Livre.

A seguir um pequeno exemplo de como é feita a autenticação usando esta biblioteca.

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\Authorization\AuthorizationService;

$meli = new Meli('APP-ID', 'SECRET-ID');
$service = new AuthorizationService($meli);

if(isset($_GET['code'])) {
   $service->authorize($_GET['code'], 'https://your-domain.com/login.php');
   header('Location: https://your-domain.com');
}

echo '<br><br><a href="' . $service->getOAuthUrl('https://your-domain/login.php') . '">Login using MercadoLibre oAuth 2.0</a>';
```

Com o usuário autenticado já podemos publicar nosso primeiro anúncio.

> ##### Publicando um anúncio

Com aplicação configurada e o usuário autenticado, será possível realizar a publicação de um anúncio no Mercado Livre, 
portanto, você precisa ter as informações da sua **App ID** e **Secret Key** criada na aplicação.

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Announcement\Item;
use Dsc\MercadoLivre\Announcement\Picture;
use Dsc\MercadoLivre\Announcement;

$meli = new Meli('APP-ID', 'SECRET-ID');

$item = new Item();
$item->setTitle('Test item - no offer')
     ->setCategoryId('MLB46585')
     ->setPrice(100)
     ->setCurrencyId('BRL')
     ->setAvailableQuantity(10)
     ->setBuyingMode('buy_it_now')
     ->setListingTypeId('gold_especial')
     ->setCondition('new')
     ->setDescription('Test item - no offer')
     ->setWarranty('12 months');

// Imagem do Produto        
$picture = new Picture();
$picture->setSource('http://mla-s2-p.mlstatic.com/968521-MLA20805195516_072016-O.jpg');
$item->addPicture($picture); // collection de imagens

$service = new Announcement($meli);
$response = $service->create($item);

// Link do produto publicado
echo $response->getPermalink();
```

> ##### Alterando um anúncio

Para alterar o seu anúncio, você pode recuperá-lo por meio de um serviço público.

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Announcement;
use Dsc\MercadoLivre\Requests\Product\ProductService;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service = new ProductService();
// Recuperando os dados do produto
$product = $service->findProduct('CODE');

$product->setDescription('New description item');

$service  = new Announcement($meli);
$response = $service->update($product);

// Link do produto
echo $response->getPermalink();
```

> ##### Removendo um anúncio

Para remover, basta informar o código do produto. Para realizar esta ação o anúncio tem que estar com o status **finalizado**.

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Announcement;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service  = new Announcement($meli);
$service->delete('CODE');
```

> ##### Recursos públicos

 O Mercado Livre disponibiliza recursos públicos e privados. Os recursos públicos são aqueles que qualquer pessoa que conheça a URL de um determinado 
 recurso pode acessar, ou seja, não é necessário passar sua **App-ID** e **Secret Key**. Por exemplo, ao acessar o recurso “[sites](https://api.mercadolibre.com/sites#json)”, 
 você verá todos os países nos quais o Mercado Livre atua.

> ##### Exemplos de consultas públicas

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

> ##### Recursos privados

Os recursos privados podem ser acessados somente mediante autorização, portanto, para que você
acesse estas informações é necessário que o usuário esteja logado (ou tenha passado pelo fluxo de autorização anteriormente) no Mercado Livre.

- Dados do usuário logado
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\User\UserService;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service = new UserService($meli);

// Consulta dados do usuário
$information = $service->getInformationAuthenticatedUser();

```

- Consulta de pedido
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\Order\OrderService;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service = new OrderService($meli);

// Consulta um pedido
$order = $service->findOrder('ORDER-ID');

```

> ##### Alterando o site

Por padrão, esta biblioteca está configurada para aplicações no Brasil, mas se você precisar,
esta configuração poderá ser alterada no momento em que informa suas credenciais, seguindo o exemplo:

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\Environments\Production;

// Acessando os recursos da Argentina
$meli = new Meli(
            'APP-ID', 
            'SECRET-ID',
            new Production(Site::ARGENTINA)
        );

```

Neste [link](https://github.com/discovery-tecnologia/dsc-mercado-livre/blob/master/src/Environments/Site.php) você pode verficar a lista de sites disponíveis.

> ### Licença

Esta biblioteca segue os termos de uso da [Apache-2.0](https://github.com/discovery-tecnologia/dsc-mercado-livre/blob/master/LICENSE)
