<?php
require_once 'Reader.php';
require_once 'Song.php';
require_once 'Word.php';
require_once 'Level.php';
require_once 'SongWordMerge.php';

$fileName = "WordActivity.json";
$reader = new Reader();
$song = new Song();
$word = new Word();
$level = new Level();
$songWordMerge = new SongWordMerge();

$reader->read("Resources/", "dataKichua.xlsx");
$songWordMerge->setSong($song);
$songWordMerge->setWord($word);
$songWordMerge->setLevel($level);
$song->setReader($reader);
$word->setReader($reader);
$level->setReader($reader);

$dataArray = array();

$dataArray = $songWordMerge->getGenerateArrayBySongs();

$file = fopen('Resources/'.$fileName.'', "w") or die("Problemas para generar el archivo Json - ( Resources/".$fileName." )");
fwrite($file, json_encode($dataArray,JSON_PRETTY_PRINT));
echo "El archivo ($fileName) se genero correctamente";