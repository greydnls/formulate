<?php

namespace spec\Kayladnls\Formulate\Validator\Rules\Form;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AtLeastOneRequiredSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kayladnls\Formulate\Validator\Rules\Form\AtLeastOneRequired');
    }
}
