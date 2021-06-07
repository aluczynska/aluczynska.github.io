<?php
$plik = file_get_contents("C:\Apache24\htdocs\cities.json", true);
//echo $plik;
if (array_key_exists("name", $_GET)){
$json = json_decode($plik);
$result = array();
$input = htmlspecialchars($_GET["name"]);
foreach ($json as $value){
    if (is_numeric(stripos($value->name, $input))){
        array_push($result, $value);
    }
}
$result_json = json_encode($result);
echo $result_json;
}


?>