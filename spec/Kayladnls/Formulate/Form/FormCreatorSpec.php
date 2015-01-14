<?php

namespace spec\Kayladnls\Formulate\Form;

use Doctrine\Common\Annotations\AnnotationReader;
use Kayladnls\Formulate\Mapping\DoctrineAnnotationReader;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormCreatorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new DoctrineAnnotationReader(new AnnotationReader()));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kayladnls\Formulate\Form\FormCreator');
    }

    function it_creates_a_form()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithFormLevelRuleAnnotations');
        $this->create($reflection)->shouldReturnAnInstanceOf('Kayladnls\Formulate\Form\Form');
    }
}
