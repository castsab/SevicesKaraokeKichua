<?php

require_once 'Reader.php';

class Song {
    
    protected $reader;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getConsultSongNameByLevel($level) {
        $sheet = $this->reader->getSheetObject();
        
        for($row=2;$row<=$sheet->getHighestRow(); $row++)
        {
            $cellLevelValue = $sheet->getCellByColumnAndRow(0, $row)->getValue();
            
            if ($level == $cellLevelValue)
                return $sheet->getCellByColumnAndRow(3, $row)->getValue();
        }
    }
    
}