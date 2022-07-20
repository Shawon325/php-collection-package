<?php

echo "Hello I'm running from docker";

require __DIR__ . "/vendor/autoload.php";

use ShawonCollections\Collections;

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

//$data = Collections::make()->flip();
//print_r($data);



