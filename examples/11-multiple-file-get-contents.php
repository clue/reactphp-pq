<?php

// $ php examples/11-multiple-file-get-contents.php

require __DIR__ . '/../vendor/autoload.php';

$n = isset($argv[1]) ? (int)$argv[1] : 100;

$file_get_contents = (new Clue\React\Pq\Executor())->fun('file_get_contents');
$q = new Clue\React\Mq\Queue(16, null, $file_get_contents);

$promises = [];
for ($i = 0; $i < $n; ++$i) {
    $promises[] = $q(__FILE__);
}

React\Promise\all($promises)->then(function ($results) {
    echo 'Loaded ' . count($results) . PHP_EOL;
}, function (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
});
