<?php

// $ php examples/01-file-get-contents.php

require __DIR__ . '/../vendor/autoload.php';

$file_get_contents = (new Clue\React\Pq\Executor())->fun('file_get_contents');

$file_get_contents(__FILE__)->then(function ($contents) {
    echo $contents;
}, function (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
});
