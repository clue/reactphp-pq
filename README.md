# clue/reactphp-pq

PQ ("peak"), automatically wrap blocking functions in an async child process and turn blocking functions into non-blocking promises,
built on top of [ReactPHP](https://reactphp.org/).

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

## Install

[![A clue·access project](https://raw.githubusercontent.com/clue-access/clue-access/main/clue-access.png)](https://github.com/clue-access/clue-access)

*This project is currently under active development,
you're looking at a temporary placeholder repository.*

The code is available in early access to my sponsors here: https://github.com/clue-access/reactphp-pq

Do you sponsor me on GitHub? Thank you for supporting sustainable open-source, you're awesome! ❤️ Have fun with the code! 🎉

Seeing a 404 (Not Found)? Sounds like you're not in the early access group. Consider becoming a [sponsor on GitHub](https://github.com/sponsors/clue) for early access. Check out [clue·access](https://github.com/clue-access/clue-access) for more details.

This way, more people get a chance to take a look at the code before the public release.

Rock on 🤘

## License

This project will be released under the permissive [MIT license](LICENSE).

> Did you know that I offer custom development services and issuing invoices for
  sponsorships of releases and for contributions? Contact me (@clue) for details.
