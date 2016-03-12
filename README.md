Votifier PHP Client
=================
[![Travis](https://img.shields.io/travis/D3strukt0r/Votifier-PHP-Client.svg)](https://travis-ci.org/D3strukt0r/Votifier-PHP-Client) [![Packagist](https://img.shields.io/packagist/dt/d3strukt0r/votifier-client.svg)](https://packagist.org/packages/d3strukt0r/votifier-client) [![Packagist](https://img.shields.io/packagist/v/d3strukt0r/votifier-client.svg)]() [![Packagist](https://img.shields.io/packagist/l/d3strukt0r/votifier-client.svg)]()
This php script allows easy using of the bukkit plugin Votifier

## Installation

Add the client using [Composer](http://getcomposer.org/).
```
$ composer require d3strukt0r/votifier-client dev-master
```

## Usage

Simply create an object with all informations and then send it.
```php
use Votifier\Client\Vote;

$vote = new \Votifier\Client\Vote(
                '192.168.0.52',
                8192,
                'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvGiuyYu0WU2Jp5pEsZb32b5JnBzFQDh8ihzdoK0gQCQLFZ7SRE9kCq5jOmpUdnXX9Zvdx0S3a8/iVI2N2cldERtD55Um90OTlzhXBrW4gCl0MlBZLkOW4pzXPOJ8a3UwGwSzBtlwwb+0dl4Vmy8xon3YbZeHC3mUKjbxo/x3RPys4S1psxKXldU4jRFx55ifBnhc8zyfykCt3CXUAPMTAK+nNdIXJQ6ZOQFJPQ1tP6mUHb/8AAI+IoMMKsXPTAU1+ZP6wvxy3dQcBHU0vw44NwckcY7AKSsuxqBIcbLaadbjNZfS1Ts1OWmk5bN0RKj/sC2LHmcIVzHXMwVBH5ynbwIDAQAB',
                $_POST['username'],
                'My own list'
);

if($vote->send()) {
    // Connection created, and vote sent. Doesn't mean the server handeled it correctly, but the client did.
} else {
    // Could not send Vote. Normally this happens when the client can't create a connection.
}
```

## API

You can use these function:
  * **__contruct($server_ip, $votifier_port, $public_key, $username, $server_list, $user_ip)**, initialized the object with the required informations
  * **send()**, creates socket to the server and sends the vote package
