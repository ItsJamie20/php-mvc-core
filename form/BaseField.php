<?php

namespace jamiegumbrell\phpmvc\form;

use jamiegumbrell\phpmvc\Model;

abstract class BaseField{

    abstract public function renderInput(): string;

    public Model $model;
    public string $attribute;
    public bool $hidden;
    
    public function __construct(Model $model, string $attribute){
        $this->model = $model;
        $this->attribute = $attribute;
        $this->hidden = FALSE;
    }

    public function __toString()
    {
        if($this->hidden){
            return $this->renderHidden();
        }
        return sprintf('
            <div class="form-group">
                <label>%s</label>
                %s
                <div class="invalid-feedback">%s</div>
            </div>', 
        $this->model->getLabel($this->attribute), 
        $this->renderInput(),
        $this->model->getFirstError($this->attribute)
        );
    }

}