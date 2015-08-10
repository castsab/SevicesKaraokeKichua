<?php

require_once 'Reader.php';

class Word {
    
    protected $reader;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getWordsByPhrase($phrase,$rowPhrase) {
        $sheet = $this->reader->getSheetObject();
        return $sheet->getCellByColumnAndRow(2,$rowPhrase)->getValue();
    }
    
    public function getArrayWordsByPhrase($phrase, $rowPhrase) {
        $sheet = $this->reader->getSheetObject();
        $wordsArray = array();
        $words = $this->getWordsByPhrase($phrase,$rowPhrase);
        $wordsArray = explode(",",$words);
        return $wordsArray;
    }
    
}
