<?php

class songWordMerge {
    
    /**
     * @type Reader
     * @type Song
     * @type Phrase
     * @type Word 
     */
    
    protected $reader;
    protected $song;
    protected $word;
    protected $level;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setSong($song) {
        $this->song = $song;
    }
    
    public function setWord($word) {
        $this->word = $word;
    }
    
    public function setLevel($level) {
        $this->level = $level;
    }
    
    public function getGenerateArrayBySongs() {
        $songsArray = $this->song->getArrayAllSongs();
        $dataArray = array();

        foreach ($songsArray as $i => $songName) {
            
            $dataArray[$i]['name'] = $songName;
            $showWordsArray = $this->word->getArrayWordsBySong($songName);
            $dataArray[$i]['showWords'] = $showWordsArray;
            $wordsValidsArray = $this->word->getArrayWordsValidsBySong($songName);
            $dataArray[$i]['wordsValids'] = $wordsValidsArray;
            $numberLevel = $this->level->getLavelBySong($songName);
            $dataArray[$i]['level'] = $numberLevel;
        }
        
        return $dataArray;
    }
    
}
