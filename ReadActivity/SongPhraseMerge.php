<?php

class SongPhraseMerge {
    
    /**
     * @type Reader
     * @type Song
     * @type Phrase
     * @type Word 
     */
    
    protected $reader;
    protected $song;
    protected $phrase;
    protected $word;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setSong($song) {
        $this->song = $song;
    }
    
    public function setPhrase($phrase) {
        $this->phrase = $phrase;
    }
    
    public function setWord($word) {
        $this->word = $word;
    }
    
    public function getGenerateArrayBySongs() {
        $songsArray = $this->song->getArrayAllSongs();
        $dataArray = array();

        foreach ($songsArray as $i => $songName) {
            $phrasesArray = $this->phrase->getArrayPhrasesBySong($songName);
            $dataArray[$i]['name'] = $songName;

            foreach ($phrasesArray as $j => $phrase) {
                $wordsArray = $this->word->getArrayWordsByPhrase($phrase);
                $dataArray[$i]['phrases'][$j]['phrase'] = $phrase;

                foreach ($wordsArray as $k=>$word) {
                    $dataArray[$i]['phrases'][$j]['words'][$k]['text'] = $word;
                }
            }
        }
        
        return $dataArray;
    }
    
}
