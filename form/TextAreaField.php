<?php

namespace jamiegumbrell\phpmvc\form;

use jamiegumbrell\phpmvc\Model;
use jamiegumbrell\phpmvc\form\BaseField;

class TextAreaField extends BaseField{

    public function renderInput(): string
    {
        return sprintf('<textarea name="%s"class="form-control%s">%s</textarea>',
            $this->attribute, 
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->{$this->attribute}
        );
    }

}