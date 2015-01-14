<?php namespace Kayladnls\Formulate\Stubs;

use Kayladnls\Formulate\Mapping\Form;
use Kayladnls\Formulate\Mapping\Rules;

/**
 * @Form\Form
 * @Rules\AtLeastOneRequired(fields = {"first_name", "last_name"})
 * @Rules\MaxLength
 */
final class ClassWithFormLevelRuleAnnotations
{
} 