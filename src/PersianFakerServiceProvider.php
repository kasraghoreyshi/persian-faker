<?php

namespace Kasraghoreyshi\PersianFaker;

use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class PersianFakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function($app) {
            $faker = \Faker\Factory::create();
            $newClass = new class($faker) extends \Faker\Provider\Lorem {

                // list e kalamate farsi tarjihan faghede aadad va sefaat bashand

                protected static $persianWordList = ["خط", "شب", "صف", "آب", "آخر", "نان", "آتش", "نمک", "باغ", "میز", "مهد", "بدل", "برق", "ملت", "ملک", "ملل", "مشک", "صندلی", "ابزار", "پل", "پیچ", "محل", "گوشی", "کلمه", "تیم", "هتل"];

                public static function persianWord()
                {
                    return static::randomElement(static::$persianWordList);
                }

                public static function persianWords($nb = 3, $asText = false)
                {
                    $words = [];

                    for ($i = 0; $i < $nb; ++$i) {
                        $words[] = static::persianWord();
                    }

                    return $asText ? implode(' ', $words) : $words;
                }

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

                public static function persianSentences($nb = 3, $asText = false)
                {
                    $sentences = [];
            
                    for ($i = 0; $i < $nb; ++$i) {
                        $sentences[] = static::persianSentence();
                    }
            
                    return $asText ? implode(' ', $sentences) : $sentences;
                }

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

                public static function persianParagraphs($nb = 3, $asText = false)
                {
                    $paragraphs = [];

                    for ($i = 0; $i < $nb; ++$i) {
                        $paragraphs[] = static::persianParagraph();
                    }

                    return $asText ? implode("\n\n", $paragraphs) : $paragraphs;
                }

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
            };
    
            $faker->addProvider($newClass);
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
