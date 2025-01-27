<div align="center">
  <img src="sailor.png" alt=sailor-logo">
</div>

<div align="center">

[![CI Status](https://github.com/spawnia/sailor/workflows/Continuous%20Integration/badge.svg)](https://github.com/spawnia/sailor/actions)
[![codecov](https://codecov.io/gh/spawnia/sailor/branch/master/graph/badge.svg)](https://codecov.io/gh/spawnia/sailor)
[![StyleCI](https://github.styleci.io/repos/207396174/shield?branch=master)](https://github.styleci.io/repos/207396174)
[![Latest Stable Version](https://poser.pugx.org/spawnia/sailor/v/stable)](https://packagist.org/packages/spawnia/sailor)
[![Total Downloads](https://poser.pugx.org/spawnia/sailor/downloads)](https://packagist.org/packages/spawnia/sailor)

A typesafe GraphQL client for PHP

</div>

## Installation

Install through composer

```bash
composer require spawnia/sailor
```

Run `vendor/bin/sailor` to set up a configuration file `sailor.php` in your project root.

## Usage

Sprinkle `.graphql` files throughout your app that contain the
queries and mutations you use. The contained operations must have
unique names.

Run `vendor/bin/sailor` to generate PHP classes that offer typesafe access.

Run `vendor/bin/sailor introspect` to update your schema with the latest changes
from the server by running an introspection query.

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## License

This package is licensed using the MIT License.
