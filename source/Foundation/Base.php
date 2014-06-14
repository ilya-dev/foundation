<?php namespace Foundation;

use Block\Block, Block\Line;
use Creator\Creator;
use ReflectionClass;

class Base {

    public function __construct()
    {
        if (method_exists($this, 'init'))
        {
            call_user_func_array([$this, 'init'], func_get_args());
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
