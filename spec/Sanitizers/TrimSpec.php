<?php

namespace spec\Kayladnls\Formulate\Sanitizers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TrimSpec extends ObjectBehavior
{
    function it_trims_a_string()
    {
        $this->sanitize('     YOLO     ')->shouldReturn('YOLO');
    }
}
