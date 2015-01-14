<?php namespace Kayladnls\Formulate\Stubs;

use Kayladnls\Formulate\Mapping\Fields;
use Kayladnls\Formulate\Mapping\Rules;
use Kayladnls\Formulate\Mapping\Form;

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