<?php

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

$hostname = "0.0.0.0";
$port = 3001;

function fibonacci($n)
{
    if ($n <= 1) {
        return $n;
    }

    return fibonacci($n - 1) + fibonacci($n - 2);
}

$http = new Server($hostname, $port);

$http->on("request", function (Request $request, Response $response) {
    $array = [];

    for ($i = 0; $i < 20; $i++) {
        $array[] = fibonacci($i);
    }

    $response->header("Content-Type", "application/json");
    $response->end(json_encode([
        'status' => 'success',
        'results' => $array
    ]));
});

$http->start();
