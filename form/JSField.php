<?php

namespace jamiegumbrell\phpmvc\form;

use jamiegumbrell\phpmvc\Model;
use jamiegumbrell\phpmvc\form\BaseField;

class JSField extends BaseField{

    public string $name;
    public string $script;

    public function __construct(Model $model, string $attribute, string $name, string $script){
        $this->name = $name;
        $this->script = $script;
        parent::__construct($model, $attribute);
    }

    public function renderInput(): string
    {
        return sprintf('<div id=%s></div>
        <input hidden id="%sInput" name=%s value="%s">
        <script src="%s"></script>',
            $this->name, 
            $this->name, 
            $this->attribute, 
            $this->model->getHtml(),
            $this->script
        );
    }

}