<?php namespace specs\Foundation;

use PhpSpec\ObjectBehavior;

class BaseSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Foundation\Base');
    }

}
