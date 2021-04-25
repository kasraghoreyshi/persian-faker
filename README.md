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
