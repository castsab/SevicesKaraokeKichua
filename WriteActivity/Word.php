<?php

require_once 'Reader.php';

class Word {
    
    protected $reader;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getWordsByPhrase($phrase) {
        $sheet = $this->reader->getSheetObject();
        
        for($rowPhrase=2;$rowPhrase<=$sheet->getHighestRow(); $rowPhrase++)
        {
            $cellPhraseValue = $sheet->getCellByColumnAndRow(1, $rowPhrase)->getValue();
            
            if ($phrase == $cellPhraseValue)
                return $sheet->getCellByColumnAndRow(2, $rowPhrase)->getValue();
        }
    }
    
    public function getArrayWordsByPhrase($phrase) {
        $sheet = $this->reader->getSheetObject();
        $wordsArray = array();
        $words = $this->getWordsByPhrase($phrase);
        $wordsArray = explode(",",$words);
        return $wordsArray;
    }
    
}
