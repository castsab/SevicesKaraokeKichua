<?php

class LevelPhraseMerge {
    
    /**
     * @type Reader
     * @type Level
     * @type Phrase
     * @type Word 
     */
    
    protected $reader;
    protected $level;
    protected $phrase;
    protected $word;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setLevel($level) {
        $this->level = $level;
    }
    
    public function setPhrase($phrase) {
        $this->phrase = $phrase;
    }
    
    public function setWord($word) {
        $this->word = $word;
    }
    
    public function getGenerateArrayBySongs() {
        $levelsArray = $this->level->getArrayAllLevels();
        $dataArray = array();

        foreach ($levelsArray as $i => $songName) {
            $phrasesArray = $this->phrase->getArrayPhrasesByLevel($songName);
            $dataArray[$i]['level'] = $songName;

            foreach ($phrasesArray as $j => $phrase) {
                $dataArray[$i]['phrases'][$j]['phrase'] = $phrase;
                $phraseTranslated = $this->phrase->getPhraseTranslatedByPhrase($phrase);
                $dataArray[$i]['phrases'][$j]['phraseTranslated'] = $phraseTranslated;
                
            }
        }
        
        return $dataArray;
    }
    
}
