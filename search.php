<?php
$url = file_get_contents('https://world.openfoodfacts.org/packager-code/emb-35069c/brand/sojasun.json');

$json = json_decode($url);

var_dump($json);



