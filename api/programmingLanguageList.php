<?php 

$listPL= file_get_contents("../programmingLangList.json");

$listPL =json_decode($listPL,true);


header("Content-Type: application/json");

echo json_encode($listPL)

?>