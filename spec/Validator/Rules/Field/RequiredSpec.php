<?php

namespace spec\Kayladnls\Formulate\Validator\Rules\Field;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequiredSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kayladnls\Formulate\Validator\Rules\Field\Required');
    }
}
