# Write TODOs in code that ensure you actually do them

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vangelis/todoordie.svg?style=flat-square)](https://packagist.org/packages/vangelis/todoordie)
[![Tests](https://img.shields.io/github/actions/workflow/status/vangelis/todoordie/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/vangelis/todoordie/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/vangelis/todoordie.svg?style=flat-square)](https://packagist.org/packages/vangelis/todoordie)


## Keep your projects clean
To understand why you would ever call a function to write a comment, read on.

If you have some code you know you'll need to change later, don't just leave a
comment for later that you'll never read, ever again.

For all the following cases, forgetting a TODO is NOT GOOD:
- remove some code when the dependency support expires,
- remove a feature flag,
- update some code related to another project,
- update a dependency when another refactoring is done,
- ...

This can lead to nasty issues so make your TODOs speak up when they need to
with this module ;)

You can now replace your simple comment with this function that will raise
and error when the time or the condition are met and remind you to do something
about it.

## Caution
This can cause some production apps to break ! This code is named `todoordie`,
not `todo_and_kittens` so be careful.

Pull-Requests are welcome to make this more production-ready !

Note this module has no warranty, see the LICENSE !

## Installation

You can install the package via composer:

```bash
composer require vangelis/todoordie
```

## Usage

This will raise an error if the date is reached or passed:
```php
use Vangelis\TodoOrDie\TodoOrDie;

TodoOrDie::check('Test task', '2023-01-01');
```

This will not raise an error until the condition is met (in about 75 years): 
```php
use Vangelis\TodoOrDie\TodoOrDie;

TodoOrDie::check('Test task', '2099-01-01');
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Evangelos Dimitriadis](https://github.com/vangelis183)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
