<?php

namespace spec\NoShinyUnicorn\Formulate\Form\Fields;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TextSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('some_name');
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('NoShinyUnicorn\Formulate\Form\Fields\Text');
    }

    function it_has_a_name()
    {
        $this->getName()->shouldBe('some_name');
    }

    function it_has_rules()
    {
        $this->getRules()->shouldBeArray();
    }

    public function it_has_a_type()
    {
        $this->getType()->shouldBe('text');
    }

    public function it_has_a_value()
    {
        $this->setValue('Hello, World');
        $this->getValue()->shouldBe('Hello, World');
    }
}
