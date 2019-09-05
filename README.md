# multisafepay-php
A wrapper for the MultiSafePay API.

## Installation

```
composer require whitecube/multisafepay-php
```

## Usage

You must specify two things before beginning to use the API:
- The application environment (accepted values are  `production` or `test`)
- Your MultiSafepay API key

```php
$client = new Whitecube\MultiSafepay\Client('production', 'your-api-key');

// Example: Get an existing order
$order = $client->orders()->show('order-id');
```

### Orders

The Orders API lives under the `orders` method on the client.
```php
$client->orders()->...
```

#### Creating orders
[See official docs.](https://docs.multisafepay.com/api/#create-an-order)  
Orders are represented by PHP Objects but can be submitted as regular associative arrays.

```php
use Whitecube\MultiSafepay\Entities\Order;

$order = new Order('my-order-id')
             ->type('redirect')
             ->amount(20)
             ->currency('EUR')
             ->description('2 movie tickets')
             ->paymentOptions([
                 'notification_url' => 'http://www.example.com/client/notification?type=notification',
                 'redirect_url' => 'http://www.example.com/client/notification?type=redirect',
                 'cancel_url' => 'http://www.example.com/client/notification?type=cancel', 
                 'close_window' => ''
             ]);
             
$client->orders()->create($order);

// Or as an associative array

$client->orders()->create([
    'order_id' => 'my-order-id',
    'type' => 'redirect',
    'amount' => 20,
    'currency' => 'EUR',
    'description' => '2 movie tickets',
    'payment_options' => [
        'notification_url' => 'http://www.example.com/client/notification?type=notification',
        'redirect_url' => 'http://www.example.com/client/notification?type=redirect',
        'cancel_url' => 'http://www.example.com/client/notification?type=cancel', 
        'close_window' => ''
    ]
]);

```

#### Getting orders
[See official docs.](https://docs.multisafepay.com/api/#retrieve-an-order)
Fetch an existing order's information

```php
$client->orders()->fetch('order-id');
```

#### Updating orders
[See official docs.](https://docs.multisafepay.com/api/#update-an-order)

```php
$client->orders()->update('order-id', [
    'status' => 'completed', 
    //...
]);
```