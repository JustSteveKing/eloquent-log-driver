# Eloquent Log Driver

A Laravel Log Driver for Eloquent

## Installation

Via Composer

```bash
$ composer require juststeveking/eloquent-log-driver
```

After installation, publish the migrations using:

```bash
$ php artisan vendor:publish --provider="JustSteveKing\EloquentLogDriver\ServiceProvider"
```

Then we can run our migration, which will create a table called `database_logs`.

```bash
$ php artisan migrate
```

## Registering the driver with Laravel

In your `.env` file add the following:

```env
LOG_CHANNEL=eloquent
```

Then add the following to your `config/logging.php` file under channels:

```php
'eloquent' => [
    'driver' => 'custom',
    'via' => \JustSteveKing\EloquentLogDriver\Logger\EloquentLogger::class
]
```

That is it! Your logs will now automatically start appearing in the database.

## Querying Logs

There is a small selection of helper scope available on the `DatabaseLog` model:

- `whereDebug()`
- `whereInfo()`
- `whereNotice()`
- `whereWarning()`
- `whereError()`
- `whereCritical()`
- `whereAlert()`
- `whereEmergency()`
- `whereLevel('log-level-case-insensitive')`

All of the above will return an instance of an Eloquent Builder, allowing you to chain on further query parameters.

## Testing

``` bash
$ composer run test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email juststevemcd@gmail.com instead of using the issue tracker.

## Credits

- [Steve McDougall][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/juststeveking/eloquent-log-driver.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/JustSteveKing/eloquent-log-driver/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/JustSteveKing/eloquent-log-driver.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/JustSteveKing/eloquent-log-driver.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/juststeveking/eloquent-log-driver.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/juststeveking/eloquent-log-driver
[link-travis]: https://travis-ci.org/JustSteveKing/eloquent-log-driver
[link-scrutinizer]: https://scrutinizer-ci.com/g/JustSteveKing/eloquent-log-driver/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/JustSteveKing/eloquent-log-driver
[link-downloads]: https://packagist.org/packages/juststeveking/eloquent-log-driver
[link-author]: https://github.com/JustSteveKing
[link-contributors]: ../../contributors