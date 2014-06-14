<?php namespace Foundation;

use Block\Block, Block\Line;
use Creator\Creator;
use ReflectionClass;

class Base {

    public function __construct()
    {
        $this->__setDependencies();

        if (method_exists($this, 'init'))
        {
            call_user_func_array([$this, 'init'], func_get_args());
        }
    }

    protected function __setDependencies()
    {
        foreach ($this->__getDependencies() as $dependency)
        {
            if ( ! isset ($dependency[1]))
            {
                $dependency[1] = lcfirst($dependency[0]);
            }

            $this->{$dependency[1]} = Creator::create($dependency[0]);
        }
    }

    protected function __getDependencies()
    {
        $lines = (new Block($this))->itself()->getLines();

        $lines = array_filter($lines, function(Line $line)
        {
            return $line->getTag() == 'depend';
        });

        return array_map(function(Line $line)
        {
            $chunks = explode(' ', $line->stripTag());

            if (count($chunks) == 1)
            {
                $chunks[] = null;
            }

            return $chunks;
        }, $lines);
    }

}
