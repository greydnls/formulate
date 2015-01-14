<?php namespace NoShinyUnicorn\Formulate\Stubs;

use NoShinyUnicorn\Formulate\Mapping\Fields;
use NoShinyUnicorn\Formulate\Mapping\Rules;
use NoShinyUnicorn\Formulate\Mapping\Form;

/**
 * @Form\Form
 */
final class ClassWithFieldAnnotations
{
    /**
     * @Fields\Text
     */
    private $fullName;
} 