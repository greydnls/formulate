<?php namespace NoShinyUnicorn\Formulate\Stubs;

use NoShinyUnicorn\Formulate\Mapping\Form;
use NoShinyUnicorn\Formulate\Mapping\Rules;

/**
 * @Form\Form
 * @Rules\AtLeastOneRequired(fields = {"first_name", "last_name"})
 * @Rules\MaxLength
 */
final class ClassWithFormLevelRuleAnnotations
{
} 