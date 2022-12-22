
<?php
$fetchList = file_get_contents("../programmingLangList.json");

$fetchList= json_decode($fetchList,true);

var_dump($_POST);

$newLangToAdd = [
    "name" => $_POST["name"]??null,
    "usedFor" => $_POST["usedFor"]??null,
    "logo" => $_POST["logo"]??null
];

$fetchList[]= $newLangToAdd;

$newList = json_encode($fetchList);

file_put_contents("../programmingLangList.json",$newList);



?>