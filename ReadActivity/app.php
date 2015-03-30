<?php
require_once 'Reader.php';
require_once 'Song.php';
require_once 'Phrase.php';
require_once 'Word.php';
require_once 'SongPhraseMerge.php';

$fileName = "Songs.json";
$reader = new Reader();
$song = new Song();
$phrase = new Phrase();
$word = new Word();
$songPhraseMerge = new SongPhraseMerge();

$reader->read("Resources/", "dataKichua.xlsx");
$songPhraseMerge->setSong($song);
$songPhraseMerge->setPhrase($phrase);
$songPhraseMerge->setWord($word);
$song->setReader($reader);
$phrase->setReader($reader);
$word->setReader($reader);  

$dataArray = array();

$dataArray = $songPhraseMerge->getGenerateArrayBySongs();

$file = fopen('Resources/'.$fileName.'', "w") or die("Problemas para generar el archivo Json - ( Resources/".$fileName." )");
fwrite($file, json_encode($dataArray,JSON_PRETTY_PRINT));
echo "El archivo ($fileName) se genero correctamente";