<?php

require_once 'Reader.php';

class Level {
    
    protected $reader;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }

    public function getRowSong($songName) {
        $sheet = $this->reader->getSheetObject();
       
        for($rowSong=2;$rowSong<=$sheet->getHighestRow(); $rowSong++)
        {
            $cellSongNameValue = $sheet->getCellByColumnAndRow(0, $rowSong)->getValue();
            
            if ($songName == $cellSongNameValue)
                return $rowSong;
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