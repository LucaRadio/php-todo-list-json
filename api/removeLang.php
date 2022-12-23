<?php

$listPL = file_get_contents("../programmingLangList.json");

$listPL = json_decode($listPL, true);

$index;

foreach ($listPL as $key => $singleLang) {
    $index = $key;
};

array_splice($listPL, $index, 1);

$listPL = json_encode($listPL);

file_put_contents("../programmingLangList.json", $listPL);

header("Content-Type:application/json");
