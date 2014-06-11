<?php

/**
 * @depend Foo
 * @depend Bar baz
 */
class ComplicatedClass extends Foundation\Base {

    public function init($switch = 'on')
    {
        printf('%s:%s:%s', get_class($this->foo), get_class($this->baz), $switch);
    }

}

class Foo {}

class Bar {}
