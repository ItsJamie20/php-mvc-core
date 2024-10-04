<?php

namespace jamiegumbrell\phpmvc;

use jamiegumbrell\phpmvc\db\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}