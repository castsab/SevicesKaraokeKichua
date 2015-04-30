<?php

require_once 'Reader.php';

class Word {
    
    protected $reader;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getShowWordsByLevel($level) {
        $sheet = $this->reader->getSheetObject();
        
        for($rowWord=2;$rowWord<=$sheet->getHighestRow(); $rowWord++)
        {
            $cellLevelValue = $sheet->getCellByColumnAndRow(0, $rowWord)->getValue();
            
            if ($level == $cellLevelValue)
                return $sheet->getCellByColumnAndRow(1, $rowWord)->getValue();
        }
    }
    
    public function getArrayWordsByLevel($level) {
        $sheet = $this->reader->getSheetObject();
        $wordsArray = array();
        $words = $this->getShowWordsByLevel($level);
        $wordsArray = explode(",",$words);
        return $wordsArray;
    }
    
    public function getShowWordsValidsByLevel($level) {
        $sheet = $this->reader->getSheetObject();
        
        for($rowWord=2;$rowWord<=$sheet->getHighestRow(); $rowWord++)
        {
            $cellLevelValue = $sheet->getCellByColumnAndRow(0, $rowWord)->getValue();
            
            if ($level == $cellLevelValue)
                return $sheet->getCellByColumnAndRow(2, $rowWord)->getValue();
        }
    }
    
    public function getArrayWordsValidsByLevel($level){
        $sheet = $this->reader->getSheetObject();
        $wordsArray = array();
        $words = $this->getShowWordsValidsByLevel($level);
        $wordsArray = explode(",",$words);
        return $wordsArray;
    }
    
    
    public function getConsultWordValidByLevel($level){
       $sheet = $this->reader->getSheetObject();
        
        for($row=2;$row<=$sheet->getHighestRow(); $row++)
        {
            $cellLevelValue = $sheet->getCellByColumnAndRow(0, $row)->getValue();
            
            if ($level == $cellLevelValue)
                return $sheet->getCellByColumnAndRow(2, $row)->getValue();
        } 
    }
    
    
    public function getConsultWordTranslatedByLevel($level){
       $sheet = $this->reader->getSheetObject();
        
        for($row=2;$row<=$sheet->getHighestRow(); $row++)
        {
            $cellLevelValue = $sheet->getCellByColumnAndRow(0, $row)->getValue();
            
            if ($level == $cellLevelValue)
                return $sheet->getCellByColumnAndRow(3, $row)->getValue();
        } 
    }
    
}
