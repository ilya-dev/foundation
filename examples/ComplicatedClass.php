<?php

/**
 * This class has some dependencies.
 *
 * @depend Foo
 * @depend Bar baz
 */
class ComplicatedClass extends Foundation\Base {

    public function init($switch = 'on')
    {
        printf('%s:%s:%s', get_class($this->foo), get_class($this->baz), $switch);

        echo PHP_EOL;
    }

}

class Foo {}

class Bar {}
