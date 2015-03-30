<?php

require_once('Librarys/PHPExcel/Classes/PHPExcel/IOFactory.php');
require_once('Librarys/PHPExcel/Classes/PHPExcel.php');

$objPHPExcel = new \PHPExcel();

$objPHPExcel = PHPExcel_IOFactory::load('Resources/dataKichua.xlsx');

$objHoja = $objPHPExcel->getActiveSheet(0);

$numberRows = $objHoja->getHighestRow();
$numberColumns = PHPExcel_Cell::columnIndexFromString($objHoja->getHighestColumn());

$fileName = "Songs.json";
$objSongs = array();
$song = array();

$i = -1;
$j = -1;
$k = 0;

for($row=2; $row <= $numberRows; $row++){
    
    $songName = $objHoja->getCellByColumnAndRow(0,$row)->getValue();
    $phrase = $objHoja->getCellByColumnAndRow(1,$row)->getValue();
    $words = $objHoja->getCellByColumnAndRow(2,$row)->getValue();
    
    if(!empty($songName)){
        $i++;
        $j=-1;
        $objSongs[$i]["name"] = $songName;
        $objSongs[$i]["phrases"] = array();
    }
    
    $j++;
    
    $objSongs[$i]["phrases"][$j] = array(
        "phrase"=>$phrase, "words"=>array()
    );
    
    $a_words = explode(",", $words);
    
    //print_r($a_words);
    
    $k = 0;
    
    foreach ($a_words as $word){
        
        $objSongs[$i]["phrases"][$j]["words"][$k]['text'] = $word;
        
        $k++;
    }
    
}

var_dump($objSongs);

$file = fopen('Resources/'.$fileName.'', "w") or die("Problemas para generar el archivo Json - ( Resources/".$fileName." )");

fwrite($file, json_encode($objSongs,JSON_PRETTY_PRINT));

echo "El archivo ($fileName) se genero correctamente";







