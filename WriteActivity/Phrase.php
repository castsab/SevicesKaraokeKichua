<?php

require_once 'Reader.php';
require_once 'Level.php';

class Phrase {
    
    protected $reader;
    private $lastPhraseRow = 1;
    private $lastSongSelection;
    private $rowLevel;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setSong($rowSong)
    {
        $this->rowLevel = $rowSong;
    }
    
    public function setLastPhraseRow($lastPhraseRow) {
        $this->lastPhraseRow = ($lastPhraseRow - 1);
    }
    
    public function getArrayPhrasesBySong($songName) {
        $sheet = $this->reader->getSheetObject();
        $phrasesArray = array();
        
        for($file=$this->rowLevel; $file<=$sheet->getHighestRow(); $file++)
        {
            $cellSongNameValue = $sheet->getCellByColumnAndRow(0, $file)->getValue();
            
            if (!empty($cellSongNameValue))
                $this->lastSongSelection = $cellSongNameValue;

            if($this->lastSongSelection == $songName)
            {
                $cellValue = $sheet->getCellByColumnAndRow(1, $file)->getValue();
                if (!empty($cellValue))
                    $phrasesArray[] = $cellValue;
            }
        }
        
        return $phrasesArray;
    }
    
}
