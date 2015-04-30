<?php
require_once 'Reader.php';
require_once 'Level.php';
require_once 'Phrase.php';
require_once 'Word.php';
require_once 'LevelPhraseMerge.php';

$fileName = "WriteActivity.json";
$reader = new Reader();
$level = new Level();
$phrase = new Phrase();
$word = new Word();
$levelPhraseMerge = new LevelPhraseMerge();

$reader->read("Resources/", "Actividad-escritura.xlsx");
$levelPhraseMerge->setLevel($level);
$levelPhraseMerge->setPhrase($phrase);
$levelPhraseMerge->setWord($word);
$level->setReader($reader);
$phrase->setReader($reader);
$word->setReader($reader);  

$dataArray = array();

$dataArray = $levelPhraseMerge->getGenerateArrayBySongs();

$file = fopen('Resources/'.$fileName.'', "w") or die("Problemas para generar el archivo Json - ( Resources/".$fileName." )");
fwrite($file, json_encode($dataArray,JSON_PRETTY_PRINT));
echo "El archivo ($fileName) se genero correctamente";