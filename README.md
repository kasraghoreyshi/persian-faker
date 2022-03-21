# persian-faker
Laravel faker package persian extension

## Installation

Install the package with composer:
```
composer require kasraghoreyshi/persian-faker
```

## Usage

You could use this package as an instance of ```Faker\Generator``` as you normally would use in factories.

| Methods  | Description |
| ------------- | ------------- |
| ->persianWord  | Generates a random persian word. Example: 'مهد'  |
| ->persianWords($nb = 3)  | Generates a random array of persian words. Example:  ["آتش","باغ","میز",]  |
| ->persianSentence($nb = 3, $variableNbWords = true)  | Generates a random persian sentence. Example:  "محل مشک کلمه محل پیچ پل تیم صف"  |
| ->persianSentences($nb = 3, $asText = false)  | Generates a random array of persian sentences. Example:  ["محل مشک کلمه محل پیچ پل تیم صف", ...]  |
| ->persianParagraph($nbSentences = 3, $variableNbSentences = true)  | Generates a random persian paragraph  |
| ->persianParagraphs($nb = 3, $asText = false)  | Generates a random array of persian paragraphs  |
| ->persianText($maxNBChars = 200)  | Generates a random text with the given character count  |

## Example

Below is an example of persian-faker being used in a factory.

```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->persianWord(),
            'body' => $this->faker->persianParagraph(),
        ];
    }
}
```
