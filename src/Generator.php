<?php

namespace Uptodown\RandomUsernameGenerator;

class Generator
{
    public function makeNew(
        bool $useAdjectives = true,
        bool $useColors = true,
        bool $useRandomSubjects = true,
        bool $useRandomNumber = true
    ) : string {
        $randomAdjective = $useAdjectives ? $this->getRandomAdjective() : '';
        $randomColor = $useColors ? $this->getRandomColor() : '';
        $randomSubject = $useRandomSubjects ? $this->getRandomSubject() : '';
        $randomNumber = $useRandomNumber ? $this->getRandomNumber() : '';
        
        return $randomAdjective . $randomColor . $randomSubject . $randomNumber;
    }

    private function getRandomNumber() : int
    {
        return random_int(0, 99999);
    }

    private function getRandomAdjective() : string
    {
        $adjectives = $this->getAdjectivesArray();
        return $this->getRandomItem($adjectives);
    }

    private function getRandomColor() : string
    {
        $colors = $this->getColorsArray();
        return $this->getRandomItem($colors);
    }

    private function getRandomSubject() : string
    {
        $subjects = $this->getSubjectsArray();
        return $this->getRandomItem($subjects);
    }

    private function getRandomItem(array $array) : string
    {
        return $array[random_int(0, count($array) - 1)];
    }

    private function getAdjectivesArray()  : array
    {
        return $this->getStringsFromJSON('adjectives');
    }

    private function getColorsArray() : array
    {
        return $this->getStringsFromJSON('colors');
    }

    private function getSubjectsArray() : array
    {
        return array_merge(
            $this->getStringsFromJSON('animals'),
            $this->getStringsFromJSON('birds'),
            $this->getStringsFromJSON('fruits'),
            $this->getStringsFromJSON('trees')
        );
    }

    private function getStringsFromJSON(string $collectionName) : array
    {
        return json_decode(
            file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'Strings' . DIRECTORY_SEPARATOR . $collectionName . '.json')
        );
    }
}
