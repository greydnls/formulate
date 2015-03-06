<?php
namespace spec\Kayladnls\Formulate\Mapping;
use Doctrine\Common\Annotations\AnnotationReader;
use Kayladnls\Formulate\Mapping\Fields\Field;
use Kayladnls\Formulate\Mapping\Form\Form;
use Kayladnls\Formulate\Mapping\Rules\Rule;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
class DoctrineAnnotationReaderSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new AnnotationReader);
    }
    function is_can_read_form()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithFieldAnnotations');
        $this->read($reflection)->shouldBeAForm();
    }
    function it_finds_no_annotations()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithNoAnnotations');
        $this->read($reflection)->shouldReturn([]);
    }
    function it_can_read_field_type_annotations()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithFieldAnnotations');
        $this->read($reflection)->shouldHaveField('fullName');
    }
    function it_can_read_rule_type_annotations()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithRuleAnnotations');
        $this->read($reflection)->shouldHaveFieldRule('fullName', 'Required');
    }
    function it_can_read_multiple_rule_annotations()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithRuleAnnotations');
        $this->read($reflection)->shouldHaveFieldRule('fullName', 'Required');
        $this->read($reflection)->shouldHaveFieldRule('fullName', 'MaxLength');
    }
    function it_cannot_have_multiple_field_annotations()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithTwoFieldAnnotations');
        $this->shouldThrow('\Exception')->duringRead($reflection);
    }
    function it_can_read_form_rule_annotations()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithFormLevelRuleAnnotations');
        $this->read($reflection)->shouldHaveFormRule('AtLeastOneRequired');
    }
    function it_can_read_multiple_field_rules()
    {
        $reflection = new \ReflectionClass('Kayladnls\Formulate\Stubs\ClassWithFormLevelRuleAnnotations');
        $this->read($reflection)->shouldHaveFields('AtLeastOneRequired', array('first_name', 'last_name'));
    }
    public function getMatchers()
    {
        return [
            'haveField' => function($subject, $field) {
                return array_key_exists($field, $subject) && array_key_exists('field', $subject[$field]) && $subject[$field]['field'] instanceof Field;
            },
            'haveFields' => function($subject, $rule, $fields) {
                return array_key_exists('form', $subject)
                && array_key_exists('rules', $subject['form'])
                && array_key_exists($rule, $subject['form']['rules'])
                && $subject['form']['rules'][$rule]->getFields() == $fields;
            },
            'beAForm' => function($subject) {
                return array_key_exists('form', $subject);
            },
            'haveFieldRule' => function($subject, $field, $rule_name) {
                return (
                    array_key_exists($field, $subject)
                    && array_key_exists('rules', $subject[$field])
                    && array_key_exists($rule_name, $subject[$field]['rules'])
                    && array_shift($subject[$field]['rules']) instanceof Rule );
            },
            'haveFormRule' => function($subject, $rule_name) {
                return (
                    array_key_exists('form', $subject)
                    && array_key_exists('rules', $subject['form'])
                    && array_key_exists($rule_name, $subject['form']['rules'])
                    && array_shift($subject['form']['rules']) instanceof Rule );
            }
        ];
    }
}