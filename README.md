# clue/reactphp-pq

PQ ("peak"), automatically wrap blocking functions in an async child process and turn blocking functions into non-blocking promises,
built on top of [ReactPHP](https://reactphp.org/).

## Quickstart example

Once [installed](#install), you can use the following code turn any blocking function (such as PHP's built-in [`file_get_contents()`](https://www.php.net/manual/en/function.file-get-contents.php) function) into a non-blocking one:

```php
$file_get_contents = (new Clue\React\Pq\Executor($loop))->fun('file_get_contents');

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

Do you want early access to my unreleased projects?
You can either be patient and wait for general availability or
consider becoming a [sponsor on GitHub](https://github.com/sponsors/clue) for early access.

Do you sponsor me on GitHub? Thank you for supporting sustainable open-source, you're awesome!
The prototype is available here: [https://github.com/clue-access/reactphp-pq](https://github.com/clue-access/reactphp-pq).

Support open-source and join [**clue·access**](https://github.com/clue-access/clue-access) ❤️

## License

This project will be released under the permissive [MIT license](LICENSE).

> Did you know that I offer custom development services and issuing invoices for
  sponsorships of releases and for contributions? Contact me (@clue) for details.
