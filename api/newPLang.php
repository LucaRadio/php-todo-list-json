
<?php
$fetchList = file_get_contents("../programmingLangList.json");

$fetchList = json_decode($fetchList, true);
$newLangToAdd = [
    "name" => $_POST["name"] ?? null,
    "usedFor" => $_POST["usedFor"] ?? null,
    "logo" => "https://picsum.photos/id/" . (string) rand(1, 300) . "/300"
];

$fetchList[] = $newLangToAdd;

$newList = json_encode($fetchList);

file_put_contents("../programmingLangList.json", $newList);



?>