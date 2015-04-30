<?php
require_once 'Reader.php';
require_once 'Word.php';
require_once 'Level.php';
require_once 'LevelWordMerge.php';

$fileName = "ImageWordActivity.json";
$reader = new Reader();
$word = new Word();
$level = new Level();
$levelWordMerge = new LevelWordMerge();

$reader->read("Resources/", "Actividad-imagen-palabra.xlsx");
$levelWordMerge->setLevel($level);
$levelWordMerge->setWord($word);
$word->setReader($reader);
$level->setReader($reader);

$dataArray = array();

$dataArray = $levelWordMerge->getGenerateArrayByLevels();

$file = fopen('Resources/'.$fileName.'', "w") or die("Problemas para generar el archivo Json - ( Resources/".$fileName." )");
fwrite($file, json_encode($dataArray,JSON_PRETTY_PRINT));
echo "El archivo ($fileName) se genero correctamente";