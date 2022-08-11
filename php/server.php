<?php

function fibonacci($n)
{
    if ($n <= 1) {
        return $n;
    }

    return fibonacci($n - 1) + fibonacci($n - 2);
}

$array = [];

for ($i = 0; $i < 20; $i++) {
    $array[] = fibonacci($i);
}

header('Content-Type: application/json');

echo json_encode([
    'status' => 'success',
    'results' => $array
]);
