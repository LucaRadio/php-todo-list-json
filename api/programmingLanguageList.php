<?php

$listPL = file_get_contents("../programmingLangList.json");

$listPL = json_decode($listPL, true);

foreach ($listPL as $key => $singleLang) {
    $listPL[$key]["id"] = uniqid();
};
header("Content-type:application/json");

echo json_encode($listPL, JSON_PRETTY_PRINT);
exit;
