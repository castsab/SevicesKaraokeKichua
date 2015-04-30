<?php

class levelWordMerge {
    
    /**
     * @type Reader
     * @type Phrase
     * @type Word
     * @type Song  
     */
    
    protected $reader;
    protected $level;
    protected $word;
    protected $song;
   
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setLevel($level) {
        $this->level = $level;
    }
    
    public function setWord($word) {
        $this->word = $word;
    }
    
    public function setSong($song) {
        $this->song = $song;
    }
    
    public function getGenerateArrayByLevels() {
        $levelsArray = $this->level->getArrayAllLevels();
        $dataArray = array();

        foreach ($levelsArray as $i => $numberLevel) {
            
            $dataArray[$i]['level'] = $numberLevel;
            $showWordsArray = $this->word->getArrayWordsByLevel($numberLevel);
            $dataArray[$i]['showWords'] = $showWordsArray;
            $wordsValidsArray = $this->word->getArrayWordsValidsByLevel($numberLevel);
            $dataArray[$i]['wordsValids'] = $wordsValidsArray;
            $songName = $this->song->getConsultSongNameByLevel($numberLevel);
            $dataArray[$i]['name'] = $songName;
            
        }
        
        return $dataArray;
    }
    
}
