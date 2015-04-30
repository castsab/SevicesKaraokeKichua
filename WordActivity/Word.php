<?php

require_once 'Reader.php';

class Word {
    
    protected $reader;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getShowWordsBySong($songName) {
        $sheet = $this->reader->getSheetObject();
        
        for($rowWord=2;$rowWord<=$sheet->getHighestRow(); $rowWord++)
        {
            $cellSongNameValue = $sheet->getCellByColumnAndRow(0, $rowWord)->getValue();
            
            if ($songName == $cellSongNameValue)
                return $sheet->getCellByColumnAndRow(1, $rowWord)->getValue();
        }
    }
    
    public function getArrayWordsByLevel($songName) {
        $sheet = $this->reader->getSheetObject();
        $wordsArray = array();
        $words = $this->getShowWordsBySong($songName);
        $wordsArray = explode(",",$words);
        return $wordsArray;
    }
    
    public function getShowWordsValidsBySong($songName) {
        $sheet = $this->reader->getSheetObject();
        
        for($rowWord=2;$rowWord<=$sheet->getHighestRow(); $rowWord++)
        {
            $cellSongNameValue = $sheet->getCellByColumnAndRow(0, $rowWord)->getValue();
            
            if ($songName == $cellSongNameValue)
                return $sheet->getCellByColumnAndRow(2, $rowWord)->getValue();
        }
    }
    
    public function getArrayWordsValidsByLevel($songName){
        $sheet = $this->reader->getSheetObject();
        $wordsArray = array();
        $words = $this->getShowWordsValidsBySong($songName);
        $wordsArray = explode(",",$words);
        return $wordsArray;
    }
    
    
}
