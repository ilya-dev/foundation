<?php namespace Foundation;

use Block\Block, Creator\Creator;

class Base {

    public function __construct()
    {
        $arguments = func_get_args();

        // ... set properties

        if (method_exists($this, 'init'))
        {
            call_user_func_array(
                [$this, 'init'], array_slice($arguments, $someIndex)
            );
        }
    }

}
