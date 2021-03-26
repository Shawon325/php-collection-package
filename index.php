<?php

require __DIR__ . "/vendor/autoload.php";

use ShawonCollections\Services\Collections;

$array = [
    [
        'id' => 4,
        'name' => "shawon",
    ],
    [
        'id' => 1,
        'name' => "shawon",
    ],
    [
        'id' => 2,
        'name' => "tanvir",
    ],
    [
        'id' => 3,
        'name' => "sabbir",
    ]
];
//usort($array, function ($a, $b) {return $a['id'] > $b['id'];});
//print_r( $array );

$orderByData = Collections::make($array)->orderBy('asc', 'name');
print_r($orderByData);
