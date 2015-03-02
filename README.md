jQuery Remaining Characters
===========================

Jquery plugin that adds a remaining character counter to text inputs and textareas.

## Installation

Include the package as dependency under the bower.json file.

```json
"dependencies": {
    ...
    "jquery-remaining-characters": "~1.0.0"
}
```

or install the package directly

```bash
$ bower install jquery-remaining-characters
```

## Usage

Include the source file in your page.

```html
<html>
...
    <body>
    ...
    <script type="text/javascript" src="_PATH_/remaining_characters.js" ></script>
    </body>
</html>
```

Add the maxlength attribute to the text input or textarea:
```html
<input type="text" id="my-input" maxlength="400"/>
```

And just call:

```javascript
$("#my-input").remainingCharacters();
```

or with options

```javascript
$("#my-input").remainingCharacters({
    label: {
        tag: 'p',
        class: 'char-counter',
        id: 'char-counter-count',
        errorClass: 'error-class'
    },
    text: '{n}'
});
```

The counter is updated using the keyup event. The error class is aplyed to the label if the counter reaches an invalid value.

### Options

Option | Type | Default | Description
------ | ---- | ------- | -----------
label | object |  | Options related to the label container
label.tag | string | 'p' | Html tag of the label
label.id | string | null | Id of the label
label.class | string | 'char-counter' | Class of the label
label.invalidClass | string | 'error-class' | Class to add to the label if the counter reaches an invalid number
text | string | '{n}' | Text to display inside the label where {n} is the placeholder of the remaining characters counter. i.e.: '{n} characters remaining'

## License 
Copyright &copy; 2015 José Lorente Martín. 
Licensed under the MIT license. See LICENSE.txt for details.
