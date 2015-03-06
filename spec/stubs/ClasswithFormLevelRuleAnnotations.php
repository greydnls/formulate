<?php namespace Kayladnls\Formulate\Stubs;

use Kayladnls\Formulate\Mapping\Form;
use Kayladnls\Formulate\Mapping\Fields;
use Kayladnls\Formulate\Mapping\Rules;

/**
 * @Form\Form
 * @Rules\Form\AtLeastOneRequired(fields = {"first_name", "last_name"})
 */
final class ClassWithFormLevelRuleAnnotations
{
    /**
     * @Fields\Text
     * @Rules\Field\Required
     * @Rules\Field\MaxLength
     */
    private $fullName;
} 