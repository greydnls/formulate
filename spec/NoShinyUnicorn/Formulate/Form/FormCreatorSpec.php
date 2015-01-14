<?php

namespace spec\NoShinyUnicorn\Formulate\Form;

use Doctrine\Common\Annotations\AnnotationReader;
use NoShinyUnicorn\Formulate\Mapping\DoctrineAnnotationReader;
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
        $this->shouldHaveType('NoShinyUnicorn\Formulate\Form\FormCreator');
    }

    function it_creates_a_form()
    {
        $reflection = new \ReflectionClass('NoShinyUnicorn\Formulate\Stubs\ClassWithFormLevelRuleAnnotations');
        $this->create($reflection)->shouldReturnAnInstanceOf('NoShinyUnicorn\Formulate\Form\Form');
    }
}
