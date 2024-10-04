<?php

namespace app\core\exception;

class NotFOundException extends \Exception{

    protected $code = 404;
    protected $message = 'Page not found';

}