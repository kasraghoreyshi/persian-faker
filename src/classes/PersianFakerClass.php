<?php

namespace Kasraghoreyshi\PersianFaker\classes;

use Kasraghoreyshi\PersianFaker\libs\Variables;

class PersianFakerClass extends \Faker\Provider\Lorem {

        protected static $persianWordList = null;

        public function __construct($faker){

            static::$persianWordList = (new Variables)->variable('words');

            parent::__construct($faker);

        }

        /**
         * @example 'باغ'
         *
         * @return string
         */
        public static function persianWord()
        {
            return static::randomElement(static::$persianWordList);
        }

        /**
         * Generate an array of random persian words
         *
         * @example array('باغ', 'آب', 'کتاب')
         *
         * @param int  $nb     how many words to return
         * @param bool $asText if true the sentences are returned as one string
         *
         * @return array|string
         */
        public static function persianWords($nb = 3, $asText = false)
        {
            $words = [];

            for ($i = 0; $i < $nb; ++$i) {
                $words[] = static::persianWord();
            }

            return $asText ? implode(' ', $words) : $words;
        }

        /**
         * Generate a random persian sentence
         *
         * @example 'باغ کتاب آب'
         *
         * @param int  $nbWords         around how many words the sentence should contain
         * @param bool $variableNbWords set to false if you want exactly $nbWords returned,
         *                              otherwise $nbWords may vary by +/-40% with a minimum of 1
         *
         * @return string
         */
        public static function persianSentence($nbWords = 6, $variableNbWords = true)
        {
            if ($nbWords <= 0) {
                return '';
            }

            if ($variableNbWords) {
                $nbWords = self::randomizeNbElements($nbWords);
            }

            $words = static::persianWords($nbWords);
            $words[0] = ucwords($words[0]);

            return implode(' ', $words) . '.';
        }

        /**
         * Generate an array of persian sentences
         *
         * @example array('آب ابزار صندلی', 'باغ آب کتاب')
         *
         * @param int  $nb     how many sentences to return
         * @param bool $asText if true the sentences are returned as one string
         *
         * @return array|string
         */
        public static function persianSentences($nb = 3, $asText = false)
        {
            $sentences = [];
    
            for ($i = 0; $i < $nb; ++$i) {
                $sentences[] = static::persianSentence();
            }
    
            return $asText ? implode(' ', $sentences) : $sentences;
        }

        /**
         * Generate a single persian paragraph
         *
         * @example 'کتاب ابزار پل مشک. مشک کتاب صندلی میز'
         *
         * @param int  $nbSentences         around how many sentences the paragraph should contain
         * @param bool $variableNbSentences set to false if you want exactly $nbSentences returned,
         *                                  otherwise $nbSentences may vary by +/-40% with a minimum of 1
         *
         * @return string
         */
        public static function persianParagraph($nbSentences = 3, $variableNbSentences = true)
        {
            if ($nbSentences <= 0) {
                return '';
            }

            if ($variableNbSentences) {
                $nbSentences = self::randomizeNbElements($nbSentences);
            }

            return implode(' ', static::persianSentences($nbSentences));
        }

        /**
         * Generate an array of persian paragraph
         *
         * @example array($pargraph1, $paragraph2)
         *
         * @param int  $nb     how many paragraphs to return
         * @param bool $asText if true the paragraphs are returned as one string, separated by two newlines
         *
         * @return array|string
         */
        public static function persianParagraphs($nb = 3, $asText = false)
        {
            $paragraphs = [];

            for ($i = 0; $i < $nb; ++$i) {
                $paragraphs[] = static::persianParagraph();
            }

            return $asText ? implode("\n\n", $paragraphs) : $paragraphs;
        }

        /**
         * Generate a persian text string.
         * Depending on the $maxNbChars, returns a string made of persian words, persian sentences, or persian paragraphs.
         *
         * @example 'میز کتاب صندلی'
         *
         * @param int $maxNbChars Maximum number of characters the text should contain (minimum 5)
         *
         * @return string
         */
        public static function persianText($maxNbChars = 200)
        {
            if ($maxNbChars < 5) {
                throw new \InvalidArgumentException('persianText() faghat mitavanad motoone balaye 5 character ra tolid konad');
            }

            $type = ($maxNbChars < 25) ? 'persianWord' : (($maxNbChars < 100) ? 'persianSentence' : 'persianParagraph');

            $text = [];

            while (empty($text)) {
                $size = 0;

                // until $maxNbChars is reached
                while ($size < $maxNbChars) {
                    $word = ($size ? ' ' : '') . static::$type();
                    $text[] = $word;

                    $size += strlen($word);
                }

                array_pop($text);
            }

            if ($type === 'word') {
                // capitalize first letter
                $text[0] = ucwords($text[0]);

                // end sentence with full stop
                $text[count($text) - 1] .= '.';
            }

            return implode('', $text);
        }    
}