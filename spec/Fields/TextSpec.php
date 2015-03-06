<?php

namespace spec\Kayladnls\Formulate\Fields;

use Kayladnls\Formulate\Validator\Rules\Field\Required;
use Kayladnls\Formulate\Validator\Rules\Form\AtLeastOneRequired;
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
        $this->shouldHaveType('Kayladnls\Formulate\Fields\Text');
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

    public function it_can_add_field_rules()
    {
        $rule = new Required();
        $this->addRule($rule);
        $this->getRules()->shouldBeArray();
    }

    function it_cannot_add_form_level_rules()
    {
        $rule = new AtLeastOneRequired();
        $this->shouldThrow('Exception')->during('addRule', array($rule));
    }
}
