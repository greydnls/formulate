<?php

namespace spec\NoShinyUnicorn\Formulate\Mapping;

use Doctrine\Common\Annotations\AnnotationReader;
use NoShinyUnicorn\Formulate\Mapping\Fields\Field;
use NoShinyUnicorn\Formulate\Mapping\Fields\Text;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DoctrineAnnotationReaderSpec extends ObjectBehavior
{
    function let()
    {
        $reader = new AnnotationReader;
        $this->beConstructedWith($reader);
    }

    function it_finds_no_annotations()
    {
        $reflection = new \ReflectionClass('NoShinyUnicorn\Formulate\Stubs\ClassWithNoAnnotations');
        $this->read($reflection)->shouldReturn([]);
    }

    function it_can_read_field_annotation()
    {
        $reflection = new \ReflectionClass('NoShinyUnicorn\Formulate\Stubs\ClassWithFieldAnnotations');
        $this->read($reflection)->shouldHaveField('fullName');
    }

    public function getMatchers()
    {
        return [
            'haveField' => function($subject, $field) {
                return array_key_exists($field, $subject) && array_key_exists('field', $subject[$field]) && $subject[$field]['field'] instanceof Field;
            }
        ];
    }
}
