<?php

namespace Uptodown\RandomUsernameGenerator;

class Generator
{
    /**
     * @param bool $useAdjectives
     * @param bool $useColors
     * @param bool $useRandomSubjects
     * @param bool $useRandomNumber
     * @return string
     */
    public function makeNew(
        $useAdjectives = true,
        $useColors = true,
        $useRandomSubjects = true,
        $useRandomNumber = true
    ) {
        $randomAdjective = $useAdjectives ? $this->getRandomAdjective() : '';
        $randomColor = $useColors ? $this->getRandomColor() : '';
        $randomSubject = $useRandomSubjects ? $this->getRandomSubject() : '';
        $randomNumber = $useRandomNumber ? $this->getRandomNumber() : '';
        
        return $randomAdjective . $randomColor . $randomSubject . $randomNumber;
    }

    private function getRandomNumber() // : integer
    {
        return mt_rand(0, 99999);
    }

    private function getRandomAdjective() // : string
    {
        $adjectives = $this->getAdjectivesArray();
        return $this->getRandomItem($adjectives);
    }

    private function getRandomColor() // : string
    {
        $colors = $this->getColorsArray();
        return $this->getRandomItem($colors);
    }

    private function getRandomSubject() // : string
    {
        $subjects = $this->getSubjectsArray();
        return $this->getRandomItem($subjects);
    }

    private function getRandomItem($array)
    {
        return $array[mt_rand(0, count($array) - 1)];
    }

    private function getAdjectivesArray() // : array
    {
        return $this->getStringsFromJSON('adjectives');
    }

    private function getColorsArray() // : array
    {
        return $this->getStringsFromJSON('colors');
    }

    private function getSubjectsArray() // : array
    {
        return array_merge(
            $this->getStringsFromJSON('animals'),
            $this->getStringsFromJSON('birds'),
            $this->getStringsFromJSON('fruits'),
            $this->getStringsFromJSON('trees')
        );
    }

    private function getStringsFromJSON($collectionName) // : array
    {
        return json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'Strings' . DIRECTORY_SEPARATOR . $collectionName . '.json'));
    }
}
