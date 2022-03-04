<?php

// $ php examples/02-multiple-sleep.php

require __DIR__ . '/../vendor/autoload.php';

$sleep = (new Clue\React\Pq\Executor())->fun('sleep');

$promises = [
    $sleep(2),
    $sleep(3),
    $sleep(2)
];

$promise = React\Promise\all($promises);
$promise->then(function ($results) {
    var_dump($results);
}, function (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
});
