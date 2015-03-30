<?php

require_once 'Reader.php';
require_once 'Song.php';

class Phrase {
    
    protected $reader;
    private $lastPhraseRow = 1;
    private $lastSongSelection;
    private $rowSong;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setSong($rowSong)
    {
        $this->rowSong = $rowSong;
    }
    
    public function setLastPhraseRow($lastPhraseRow) {
        $this->lastPhraseRow = ($lastPhraseRow - 1);
    }
    
    public function getArrayPhrasesBySong($songName) {
        $sheet = $this->reader->getSheetObject();
        $phrasesArray = array();
        
        for($file=$this->rowSong; $file<=$sheet->getHighestRow(); $file++)
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
