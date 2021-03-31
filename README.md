# Biblioteca de integração com o Mercado Livre (não é a oficial!)

[![Build Status](https://travis-ci.org/discovery-tecnologia/dsc-mercado-livre.svg?branch=master)](http://travis-ci.org/#!/discovery-tecnologia/dsc-mercado-livre)
[![Packagist](https://img.shields.io/packagist/v/dsc/mercado-livre?include_prereleases)](https://github.com/discovery-tecnologia/dsc-mercado-livre?include_prereleases)
[![Hex.pm](https://img.shields.io/hexpm/l/plug.svg?style=flat-square)](https://github.com/discovery-tecnologia/dsc-mercado-livre/blob/master/LICENSE)

**Obs: essa lib foi construída pela comunidade, se vc deseja utilizar a biblioteca oficial mantida pelo Mercado Livre** - *[clique aqui](https://github.com/mercadolibre/php-sdk)*

> ### Funcionalidades

- Autenticação e Autorização
- Consulta dos dados do usuário
- Consulta de categorias
- Consulta de moedas
- Consulta e publicação de anúncios
- Consulta de pedidos
- Consulta de pagamentos
- Envio de mensagem de pós venda para cliente
- Publicando feedback para um pedido

> ### Requisitos

- PHP 5.6+ ou PHP 7+
- Autoloader compatível com a PSR-4

> ### Dependências

- Guzzle
- JMS Serializer
- Doctrine Collections
- Doctrine Cache

> ### Instalação

Para instalar a biblioteca basta adicioná-la via [composer](https://getcomposer.org/download/)

PHP 5.6+ (versao 1.*)
```composer
composer require dsc/mercado-livre 1.*
```

Ou no composer.json

```json
{
    "dsc/mercado-livre": "1.*"
}
```

PHP 7+ (versao 2.*)
```composer
composer require dsc/mercado-livre 2.*
```

Ou no composer.json

```json
{
    "dsc/mercado-livre": "2.*"
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
[autenticação e autorização](http://developers.mercadolibre.com/products-authentication-authorization/) do Mercado Livre.

A seguir um pequeno exemplo de como é feita a autenticação usando OAuth com esta biblioteca.

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

Caso queira enviar o parâmetro state, é possível fazê-lo, como no exemplo:
```php
echo '<br><br><a href="' . $service->getOAuthUrl('https://your-domain/login.php', 'your-state-value') . '">Login using MercadoLibre oAuth 2.0</a>';
```

> ##### Exemplo de autenticação Server Side

Outra forma de conseguir o AccessToken é realizando a consulta via client_credentials. Esta forma, é recomendada para scripts que rodam em rotinas automáticas (via cron, ou tarefas agendadas). **OBS:** para conseguir utilizar, você precisa ter configurado em sua APP, o **Scope offline access** marcado.

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado
use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\Authorization\AuthorizationService;

// seu script background

$meli = new Meli('APP-ID', 'SECRET-ID');
$service = new AuthorizationService($meli);

$token = $service->getAccessToken();

// seu script background

```

**Importante:** a lib irá armazenar o access_token e o refresh_token para utilizar nas requisiçōes que necessitarão de autenticação. Ou seja, quando o access_token estiver expirado, ele será atualizado automaticamente pela lib, utilizando o refresh_token.

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

// E NECESSARIO ESTAR AUTENTICADO...

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

$announcement = new Announcement($meli);
$response = $announcement->create($item);

// Link do produto publicado
echo $response->getPermalink();
```

> ##### Publicando um anúncio com Variações

Mais detalhes em: [Manual de Variações](https://developers.mercadolibre.com/pt_br/variacoes) 

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Requests\Category\CategoryService;
use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\Announcement\Item;
use Dsc\MercadoLivre\Announcement\Picture;
use Dsc\MercadoLivre\Announcement;
use Dsc\MercadoLivre\Requests\Category\AttributeCombination;
use Dsc\MercadoLivre\Requests\Product\Variation;

// E NECESSARIO ESTAR AUTENTICADO...

$meli = new Meli('APP-ID', 'SECRET-ID');

$item = new Item();
$item->setTitle('Test item - no offer')
     ->setCategoryId('MLB46585')
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

// Consulta os atributos de uma determinada categoria
$service = new CategoryService();
$attributes = $service->findCategoryAttributes('MLB46585');

$attributeCombination = new AttributeCombination();
// E necessario selecionar os atributos da Categoria e setar no AttributeCombination

// Primeira variacao
$variation = new Variation();
$variation->setPrice(120);
$variation->setAvailableQuantity(10);
$variation->addAttributeCombination($attributeCombination);
$variation->setPictureIds([
    'http://mla-s2-p.mlstatic.com/968521-MLA20805195516_072016-O.jpg'
]);

$item->addVariation($variation);

// Criando um Anuncio...
$announcement = new Announcement($meli);
$response = $announcement->create($item);

// Link do produto publicado
echo $response->getPermalink();
```

> ##### Publicando um anúncio com Atributos

Mais detalhes em: [Manual de Atributos](https://developers.mercadolibre.com/pt_br/atributos)

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Requests\Category\CategoryService;
use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\Announcement\Item;
use Dsc\MercadoLivre\Announcement\Picture;
use Dsc\MercadoLivre\Announcement;
use Dsc\MercadoLivre\Requests\Category\AttributeCombination;
use Dsc\MercadoLivre\Requests\Product\Variation;

// E NECESSARIO ESTAR AUTENTICADO...

$meli = new Meli('APP-ID', 'SECRET-ID');

$item = new Item();
$item->setTitle('Test item - no offer')
     ->setCategoryId('MLB46585')
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

// Consulta os atributos de uma determinada categoria
$service = new CategoryService();
$attributes = $service->findCategoryAttributes('MLB46585');

$item->setAttributes($attributes);

// Criando um Anuncio...
$announcement = new Announcement($meli);
$response = $announcement->create($item);

// Link do produto publicado
echo $response->getPermalink();
```

> ##### Alterando um anúncio

Para alterar o seu anúncio... 

Isso irá variar se o produto já tiver vendas ou não. Além disso, 
lembre-se de que para poder alterar um produto, ele deve estar **ativo**. 
Você pode alterar valores para:
- Title
- Available_quantity
- Price
- Video
- Pictures
- Shipping

Segue [link do manual](http://developers.mercadolibre.com/products-sync-listings/#Considerations)

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Announcement;

$meli = new Meli('APP-ID', 'SECRET-ID');

$data = [
    'title' => 'New title',
    'available_quantity' => 10,
    'price' => 100
];

$announcement = new Announcement($meli);
$response = $announcement->update('ITEM-CODE', $data);

// Link do produto
echo $response->getPermalink();
```

> ##### Adição ou substituição de uma descrição existente

A descrição de um produto contém informações personalizadas sobre o produto que você está vendendo. 
Você escolhe a quantidade de informações que vai adicionar à descrição do produto e como elas serão exibidas. 
Você pode escolher entre uma descrição simples ou um texto sem formatação.
As informações exibidas na descrição devem ser um complemento dos atributos do produto que já estamos exibindo 
na página de descrição do produto. Por exemplo, você pode adicionar especificações, imagens, detalhes da venda, 
anúncios promocionais e tudo que achar útil e atrativo para que os compradores escolham seu produto, 
reduzindo a necessidade de fazer mais perguntas antes de fazer uma oferta.

Elementos que devem ser evitados:
- Iframes
- Scripts
- Forms
- Inputs
- Meta
- Object
- Embed

Caso você não tenha enviado nada na descrição no momento de publicar o produto, você pode usar o 
seguinte tutorial para adicioná-la depois. Siga o exemplo a seguir:

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Announcement;

$meli = new Meli('APP-ID', 'SECRET-ID');

$description = '<p>New description item</p>';

$announcement = new Announcement($meli);
$response = $announcement->changeDescription('ITEM-CODE', $description);

echo $response->getPermalink();
```
> ##### Alterando o status de um anúncio

Qualquer produto publicado no Mercado Livre pode ter diferentes status; a seguir, analise a descrição de cada um deles:

- **CLOSED**: finaliza sua publicação. Uma vez encerrada, a publicação não poderá ser ativada novamente, mas pode ser publicada novamente.
- **PAUSED**: pausa sua publicação. Uma vez pausado, o produto não poderá ser visualizado pelos outros usuários do Mercado Livre, mas não será encerrado e poderá ser reativado depois.
- **ACTIVE**: reativa um produto previamente pausado.

Se você precisar fazer alterações no status do produto, deverá enviar um desses valores para o campo “status”. Lembre de que o valor diferencia entre letras maiúsculas e minúsculas e deve ser enviado em letras minúsculas.
Para pausar um produto ativo, veja o exemplo a seguir:

```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Announcement;
use Dsc\MercadoLivre\Announcement\Status;

$meli = new Meli('APP-ID', 'SECRET-ID');

$announcement = new Announcement($meli);
$response = $announcement->changeStatus('ITEM-CODE', Status::PAUSED); // pausa o anúncio

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

$announcement = new Announcement($meli);
$announcement->delete('ITEM-CODE');
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

// Consulta a lista de categorias a partir do título de um produto
$categories = $service->findCategoryPredictor(Site::BRASIL, 'titulo-do-seu-produto');

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

- Consulta de vários pedidos
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\Order\OrderService;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service = new OrderService($meli);
// Consulta de pedidos de um vendedor
$orders = $service->findOrdersBySeller('SELLER-ID');
// Ou Consulta de pedidos de um comprador
$orders = $service->findOrdersByBuyer('BUYER-ID');

// Nesses métodos você tem a opção de passar alguns parâmetros adicionais
// para paginação ou ordenação
$limit = 50;
$offset = 0;
$sort = 'date_desc';
$orders = $service->findOrdersBySeller('SELLER-ID', $limit, $offset, $sort);
```

- Consulta de pagamentos
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\Payment\PaymentService;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service = new PaymentService($meli);

// Consulta um pagamento
$payment = $service->findPayment('PAYMENT-ID');

// Consulta um pagamento de vendedor
$payment = $service->findPaymentOfSeller('PAYMENT-ID');
```

- Consulta de dados de envio
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\Shipment\ShipmentService;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service = new ShipmentService($meli);

// Consulta um envio
$shipment = $service->findShipment('SHIPMENT-ID');
```

- Envio de mensagem de pós venda para cliente
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\Message\MessageService;
use Dsc\MercadoLivre\Resources\Message\From;
use Dsc\MercadoLivre\Resources\Message\Message;
use Dsc\MercadoLivre\Resources\Message\To;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service = new MessageService($meli);

// identifica o vendedor
$from = new From();
$from->setUserId('SELLER-ID');

// identifica o cliente
$to = new To();
$to->setUserId('USER-ID');

$message = new Message();
$message->setFrom($from);
$message->setTo($to);
$message->setText("Text message");

// Enviando a mensagem
$messageResponse = $service->send($message, 'ORDER-ID', 'SELLER-ID');
```

- Publicando feedback para um pedido
```php
<?php
// Consideramos que já existe um autoloader compatível com a PSR-4 registrado

use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\Resources\Feedback\FeedbackPost;
use Dsc\MercadoLivre\Resources\Feedback\Rating;
use Dsc\MercadoLivre\Resources\Order\OrderService;

$meli = new Meli('APP-ID', 'SECRET-ID');

$service = new OrderService($meli);

// Criando o feedback a ser postado
$feedback = new FeedbackPost();
$feedback->setFulfilled(true);
$feedback->setMessage('Test');
$feedback->setRating(Rating::POSITIVE);

// Publicando o feedback
$feedbackResponse = $service->publishFeedback($feedback, 'ORDER-ID');
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

> ### Contribua!

Quer contribuir? [clique aqui](https://github.com/discovery-tecnologia/dsc-mercado-livre/blob/master/CONTRIBUTING.md)

> ### Licença

Esta biblioteca segue os termos de uso da [Apache-2.0](https://github.com/discovery-tecnologia/dsc-mercado-livre/blob/master/LICENSE)
