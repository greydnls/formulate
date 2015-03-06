<?php

namespace spec\Kayladnls\Formulate\Form;

use Kayladnls\Formulate\Fields\Text;
use Kayladnls\Formulate\Validator\Rules\Field\Required;
use Kayladnls\Formulate\Validator\Rules\Form\AtLeastOneRequired;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormSpec extends ObjectBehavior
{
    function it_can_get_add_and_get_a_field()
    {
        $field = new Text('some_name');
        $this->addField($field);
        $this->getField('some_name')->shouldHaveType('Kayladnls\Formulate\Fields\Text');
    }

    function it_can_add_form_rules()
    {
        $rule = new AtLeastOneRequired();
        $this->addRule($rule);
        $this->getRules()->shouldBeArray();
    }

    function it_cannot_add_field_level_rules()
    {
        $rule = new Required();
        $this->shouldThrow('Exception')->during('addRule', array($rule));
    }

}
