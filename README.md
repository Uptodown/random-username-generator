# Random Username Generator

A random username generator with animals, fruits, etc.

[![Packagist](https://img.shields.io/packagist/dt/uptodown/random-username-generator.svg?style=flat-square)](https://packagist.org/packages/uptodown/random-username-generator) [![MIT License](https://img.shields.io/badge/license-MIT-007EC7.svg?style=flat-square)](http://opensource.org/licenses/MIT)

## Installation

To install it with composer:
```
composer require uptodown/random-username-generator
```

## Simple usage

```php
use Uptodown\RandomUsernameGenerator\Generator;

$generator = new Generator();
$newUsername = $generator->makeNew();
```
