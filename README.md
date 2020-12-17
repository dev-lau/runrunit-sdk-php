# RunRunIt PHP SDK

[![Latest Stable Version](https://poser.pugx.org/devlau/runrunit/v/stable)](https://packagist.org/packages/devlau/runrunit)
[![License](https://poser.pugx.org/devlau/runrunit/license)](https://packagist.org/packages/devlau/runrunit)

SDK PHP (não oficial) para integração com a API do RunRun.it (v1.0).

O modelo do código foi baseado no [Laravel's Forge SDK](https://github.com/laravel/forge-sdk).

Para mais informações sobre a API do Runrunit, consulte a [documentação oficial](https://runrun.it/api/documentation).

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Changelog](#changelog)
- [License](#license)

## Installation

This package can be installed through Composer:

```sh
$ composer require devlau/runrunit
```

Make sure to use Composer's autoload:

Start by creating a new instance:

```php
$runrunit = new Runrunit(RUNRUNIT_APP_KEY, RUNRUNIT_USER_TOKEN);
```

Your APP_KEY and USER_TOKEN can be found in your account on the Settings page.


## Usage

Once instantiated, you can simply call one of the methods provided by the SDK:

```php
$runrunit->projects();
```

This will provide you with a list of available projects.

To create a project, you can use the `createProject` method:

```php
$project = $runrunit->createProject(
    'Project name',
    1, // Client ID
);
```

When the request was successful, `$project` will contain a Project object with the project details.


## Changelog

Refer to [CHANGELOG](CHANGELOG.md) for more information.


## License

The MIT License (MIT). Refer to the [License](LICENSE.md) for more information.
