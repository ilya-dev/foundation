<?php namespace Foundation;

use Block\Block, Creator\Creator;
use ReflectionClass;

class Base {

    public function __construct()
    {
        $arguments = func_get_args();

        // set properties...
        var_dump($this->__getDependencies());exit;

        if (method_exists($this, 'init'))
        {
            call_user_func_array([$this, 'init'], $arguments);
        }
    }

    protected function __getDependencies()
    {
        $lines = (new Block($this))->itself()->getLines();

        return $lines;
    }

}
