<?php

namespace spec\Kayladnls\Formulate;

use Kayladnls\Formulate\FormManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kayladnls\Formulate\FormManager');
    }
}
