<?php

namespace MyBlockMg;

use Omeka\Module\AbstractModule;

class Module extends AbstractModule
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';  // __DIR__ is a php magic constant || . is string concatenation operator in php
    }
}

?>