Yii2 Remaining Characters Widget
================================

RemainingCharacters widget is a Yii2 wrapper for the jquery-remaining-characters jQuery plugin [Remaining Characters jQuery plugin](https://github.com/jlorente/jquery-remaining-characters). This input widget is a replacement for text and textarea inputs. It appends a container with a countdown counter of characters to the input.


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Check the [composer.json](https://github.com/jlorente/yii2-widget-remainingcharacters/composer.json) for this extension's requirements and dependencies.

To install, either run

```bash
$ php composer.phar require jlorente/yii2-widget-remainingcharacters "*"
```

or add

```json
...
    "require": {
        ...
        "jlorente/yii2-widget-remainingcharacters": "*"
    }
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
use jlorente\remainingcharacters\RemainingCharacters;

// 
echo $form->field($model, 'my-textarea')->widget(RemainingCharacters::classname(), [
    'type' => RemainingCharacters::INPUT_TEXTAREA,
    'text' => Yii::t('app', '{n} characters remaining'),
    'label' => [
        'tag' => 'p',
        'id' => 'my-counter',
        'class' => 'counter',
        'invalidClass' => 'error'
    ],
    'options' => [
        'rows' => '3',
        'class' => 'col-md-12',
        'maxlength' => 200,
        'placeholder' => Yii::t('app', 'Write something')
    ]
]);
```

Where options array are the options for the textarea.

### Options

Option | Type | Default | Description
------ | ---- | ------- | -----------
type | string | RemainingCharacters::INPUT_TEXTAREA | Type of the input. Must be RemainingCharacters::INPUT_TEXTAREA or RemainingCharacters::INPUT_TEXT
text | string | '{n}' | Text to display inside the label where {n} is the placeholder of the remaining characters  counter. i.e.: '{n} characters remaining'
label | array |  | Options related to the label container
label.tag | string | 'p' | Html tag of the label
label.id | string | null | Id of the label
label.class | string | 'char-counter' | Class of the label
label.invalidClass | string | 'error' | Class to add to the label if the counter reaches an invalid number
options | array | | Options for the input text or textarea. See ActiveField::textarea() or ActiveField::textInput() for more information

## License 
Copyright &copy; 2015 José Lorente Martín. 
Licensed under the MIT license. See LICENSE.txt for details.
