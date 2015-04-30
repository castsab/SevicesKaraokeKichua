<?php
require_once 'Reader.php';
require_once 'Level.php';
require_once 'Word.php';
require_once 'Song.php';
require_once 'LevelWordMerge.php';

$fileName = "WordActivity.json";
$reader = new Reader();
$level = new Level();
$word = new Word();
$song = new Song();
$levelWordMerge = new levelWordMerge();

$reader->read("Resources/", "Actividad-palabras.xlsx");
$levelWordMerge->setWord($word);
$levelWordMerge->setLevel($level);
$levelWordMerge->setSong($song);
$level->setReader($reader);
$word->setReader($reader);
$song->setReader($reader);

$dataArray = array();

$dataArray = $levelWordMerge->getGenerateArrayByLevels();

$file = fopen('Resources/'.$fileName.'', "w") or die("Problemas para generar el archivo Json - ( Resources/".$fileName." )");
fwrite($file, json_encode($dataArray,JSON_PRETTY_PRINT));
echo "El archivo ($fileName) se genero correctamente";