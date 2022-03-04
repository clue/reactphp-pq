# clue/reactphp-pq

PQ ("peak"), automatically wrap blocking functions in an async child process and turn blocking functions into non-blocking promises,
built on top of [ReactPHP](https://reactphp.org/).

**Table of contents**

* [Support us](#support-us)
* [Quickstart example](#quickstart-example)
* [Install](#install)
* [Usage](#usage)
    * [Executor](#executor)
        * [fun()](#fun)
* [Tests](#tests)
* [License](#license)

## Support us

[![A clue·access project](https://raw.githubusercontent.com/clue-access/clue-access/main/clue-access.png)](https://github.com/clue-access/clue-access)

*This project is currently under active development,
you're looking at a temporary placeholder repository.*

The code is available in early access to my sponsors here: https://github.com/clue-access/reactphp-pq

Do you sponsor me on GitHub? Thank you for supporting sustainable open-source, you're awesome! ❤️ Have fun with the code! 🎉

Seeing a 404 (Not Found)? Sounds like you're not in the early access group. Consider becoming a [sponsor on GitHub](https://github.com/sponsors/clue) for early access. Check out [clue·access](https://github.com/clue-access/clue-access) for more details.

This way, more people get a chance to take a look at the code before the public release.

## Quickstart example

Once [installed](#install), you can use the following code turn any blocking function (such as PHP's built-in [`file_get_contents()`](https://www.php.net/manual/en/function.file-get-contents.php) function) into a non-blocking one:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$executor = new Clue\React\Pq\Executor();
$file_get_contents = $executor->fun('file_get_contents');

$file_get_contents(__FILE__)->then(function (string $contents) {
    echo $contents;
}, function (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
});
```

## Usage

### Executor

The `Executor` is responsible for managing process executions.

This class takes an optional `LoopInterface|null $loop` parameter that can be used to
pass the event loop instance to use for this object. You can use a `null` value
here in order to use the [default loop](https://github.com/reactphp/event-loop#loop).
This value SHOULD NOT be given unless you're sure you want to explicitly use a
given event loop instance.

```php
$executor = Clue\React\Pq\Executor();
```

#### fun()

The `fun(string $function): callable` method can be used to
return an async callable for the given global blocking function name.

This method returns an async callable that will return a promise when
invoked. The promise will eventually fulfill with the return value of the
function on success or reject with an `Exception` on error:

```php
$executor = new Clue\React\Pq\Executor();
$file_get_contents = $executor->fun('file_get_contents');

$file_get_contents(__FILE__)->then(function (string $contents) {
    echo $contents;
}, function (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
});
```

You can pass any number of arguments that will be passed to the given
function. The function will be executed in a child process and as such
will not block the execution of the parent process.

The callable can be invoked any number of times, each function call will
take place in a separate child process. Once completed, child processes
may be reused internally.

## Install

The recommended way to install this library is [through Composer](https://getcomposer.org/).
[New to Composer?](https://getcomposer.org/doc/00-intro.md)

This project does not yet follow [SemVer](https://semver.org/).
This will install the latest supported version:

While in beta, you first have to manually change your `composer.json` to include these lines:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/clue-access/reactphp-pq"
        }
    ]
}
```

Then install this package as usual:

```bash
$ composer require clue/reactphp-pq:dev-main
```

This project aims to run on any platform and thus does not require any PHP
extensions and supports running on PHP 7 through current PHP 8+.

## Tests

To run the test suite, you first need to clone this repo and then install all
dependencies [through Composer](https://getcomposer.org/):

```bash
$ composer install
```

To run the test suite, go to the project root and run:

```bash
$ vendor/bin/phpunit
```

## License

This project is released under the permissive [MIT license](LICENSE).

> Did you know that I offer custom development services and issuing invoices for
  sponsorships of releases and for contributions? Contact me (@clue) for details.
