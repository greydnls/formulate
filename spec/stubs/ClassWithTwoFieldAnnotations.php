<?php namespace NoShinyUnicorn\Formulate\Stubs;

use NoShinyUnicorn\Formulate\Mapping\Fields;
use NoShinyUnicorn\Formulate\Mapping\Rules;
use NoShinyUnicorn\Formulate\Mapping\Form;

/**
 * @Form\Form
 */
final class ClassWithTwoFieldAnnotations
{
    /**
     * @Fields\Text
     * @Fields\Integer
     */
    private $fullName;
} 