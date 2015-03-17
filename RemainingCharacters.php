<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */

namespace jlorente\remainingcharacters;

use yii\widgets\InputWidget;
use yii\helpers\Json;
use yii\helpers\Html;

/**
 * RemainingCharacters widget is a Yii2 wrapper for the jquery-remaining-characters 
 * jQuery plugin. 
 * This input widget is a replacement for text and textarea inputs. It appends a 
 * container with a countdown counter of characters to the input.
 * 
 * @author José Lorente <jose.lorente.martin@gmail.com>
 * @since 1.0
 * @see https://github.com/jlorente/jquery-remaining-characters
 */
class RemainingCharacters extends InputWidget {

    /**
     * Textarea type.
     */
    const INPUT_TEXTAREA = 'textarea';

    /**
     * Input text type.
     */
    const INPUT_TEXT = 'textinput';

    /**
     *
     * @var string Type of the input. It must be one of the [[INPUT_TEXTAREA]] 
     * or [[INPUT_TEXT]] constants. Default to [[INPUT_TEXTAREA]].
     */
    public $type = self::INPUT_TEXTAREA;

    /**
     *
     * @var array Options for the label of the counter container. 
     */
    public $label = [
        'tag' => 'p',
        'class' => 'char-counter',
        'id' => null,
        'invalidClass' => 'error'
    ];

    /**
     * @var string Text to display the counter. Default to {n}. You may provide 
     * a text using {n} as placeholder for the number.
     * 
     * i.e.: {n} characters remaining 
     */
    public $text = '{n}';

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        RemainingCharactersAsset::register($this->getView());

        $this->renderJs();
    }

    /**
     * @inheritdoc
     */
    public function run() {
        if ($this->hasModel()) {
            $method = 'active' . $this->type;
            return Html::$method($this->model, $this->attribute, $this->options);
        } else {
            $method = $this->type;
            return Html::$method($this->name, $this->value, $this->options);
        }
    }

    /**
     * Renders the js necessary to init the plugin.
     */
    protected function renderJs() {
        $id = $this->options['id'];
        $options = $this->getOptionsObject();

        $this->getView()->registerJs("$('#$id').remainingCharacters($options);");
    }

    /**
     * 
     * @return string Json object to use as options object in js.
     */
    protected function getOptionsObject() {
        return Json::encode([
                    'label' => $this->label,
                    'text' => $this->text,
        ]);
    }

}
