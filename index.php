<?php

require __DIR__ . "/vendor/autoload.php";

use ShawonCollections\Services\Collections;

$array = [
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

//$filterData = Collections::make($array)->filter(function ($key, $value) {
//    return $value['id'] > 1;
//})->toArray();
//
//print_r($filterData);
