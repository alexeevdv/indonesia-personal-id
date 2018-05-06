indonesia-personal-id
================

[![Build Status](https://travis-ci.org/alexeevdv/indonesia-personal-id.svg?branch=master)](https://travis-ci.org/alexeevdv/indonesia-personal-id)
[![codecov](https://codecov.io/gh/alexeevdv/indonesia-personal-id/branch/master/graph/badge.svg)](https://codecov.io/gh/alexeevdv/indonesia-personal-id)
![PHP 5.6](https://img.shields.io/badge/PHP-5.6-green.svg)
![PHP 7.0](https://img.shields.io/badge/PHP-7.0-green.svg)
![PHP 7.1](https://img.shields.io/badge/PHP-7.1-green.svg)
![PHP 7.2](https://img.shields.io/badge/PHP-7.2-green.svg)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require alexeevdv/indonesia-personal-id "~1.0.0"
```

or add

```
"alexeevdv/indonesia-personal-id": "~1.0.0"
```

to the ```require``` section of your `composer.json` file.


## Usage

### Validator

```php
use alexeevdv\personalid\indonesia\Validator;

$validator = new Validator;
$isValid = $validator->validate('NIK_TO_BE_VALIDATED');

```

### Parser

```php
use alexeevdv\personalid\indonesia\Parser;

$parser = new Parser;
// Returns identity instance
$identity = $parser->parse('NIK_TO_BE_PARSED');
echo $identity->birthDate()->format('Y-m-d');
```

### Builder

```php
use alexeevdv\personalid\indonesia\Builder;

$builder = new Builder;

$randomNik = $builder->random();

// Generates NIK from identity instance
$nikFromIdentity = $builder->fromIdentity($identity);

```

### Identity

You can find full methods list in `\alexeevdv\personalid\indonesia\Identity`

