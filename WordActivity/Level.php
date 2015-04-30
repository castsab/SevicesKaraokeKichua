<?php

require_once 'Reader.php';

class Level {
    
    protected $reader;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getLavelBySong($songName) {
        $sheet = $this->reader->getSheetObject();
        
        for($row=2;$row<=$sheet->getHighestRow(); $row++)
        {
            $cellSongNameValue = $sheet->getCellByColumnAndRow(0, $row)->getValue();
            
            if ($songName == $cellSongNameValue)
                return $sheet->getCellByColumnAndRow(3, $row)->getValue();
        }
    }
    
    public function getArrayAllLevels() {
        $sheet = $this->reader->getSheetObject();
        $songsArray = array();
        
        for($file=2; $file<=$sheet->getHighestRow(); $file++)
        {
            $cellValue = $sheet->getCellByColumnAndRow(0, $file)->getValue();
            if (!empty($cellValue))
                $songsArray[] = $cellValue;
        }
        
        return $songsArray;
    }
    
}