<?php

namespace jamiegumbrell\phpmvc\form;

use jamiegumbrell\phpmvc\Model;

class Form {

    public static function begin($action = '', $method = ''){
        echo sprintf('<form action="%s" method = "%s">', $action, $method);
        return new Form();
    }

    public static function end(){
        echo '</form>';
    }

    public function field(Model $model, $attribute){
        return new InputField($model, $attribute);
    }

    public function textField(Model $model, $attribute){
        return new TextAreaField($model, $attribute);
    }

    public function jsField(Model $model, $attribute, string $name, string $script){
        return new JSField($model, $attribute, $name, $script);
    }

}