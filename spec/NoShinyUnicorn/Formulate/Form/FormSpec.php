<?php

namespace spec\NoShinyUnicorn\Formulate\Form;

use NoShinyUnicorn\Formulate\Form\Fields\Text;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormSpec extends ObjectBehavior
{
    function it_can_get_add_and_get_a_field(Text $field)
    {
        $field = new Text('some_name');
        $this->addField($field);
        $this->getField('some_name')->shouldHaveType('NoShinyUnicorn\Formulate\Form\Fields\Text');
    }
}
