<?php namespace NoShinyUnicorn\Formulate\Stubs;

use NoShinyUnicorn\Formulate\Mapping\Rules;
use NoShinyUnicorn\Formulate\Mapping\Form;

/**
 * @Form\Form
 */
final class ClassWithRuleAnnotations
{
    /**
     * @Rules\Required
     * @Rules\MaxLength
     */
    private $fullName;
} 