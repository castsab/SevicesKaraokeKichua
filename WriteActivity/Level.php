<?php

class Level {
    
    /**
     * @type Reader 
     */
    protected $reader;
    private $lastLevelRow = 1;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function getRowLevel($level) {
        $sheet = $this->reader->getSheetObject();
       
        for($rowLevel=2;$rowLevel<=$sheet->getHighestRow(); $rowLevel++)
        {
            $cellSongNameValue = $sheet->getCellByColumnAndRow(0, $rowLevel)->getValue();
            
            if ($level == $cellSongNameValue)
                return $rowLevel;
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
