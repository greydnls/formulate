<?php namespace Kayladnls\Formulate\Stubs;

use Kayladnls\Formulate\Mapping\Form;
use Kayladnls\Formulate\Mapping\Sanitizers;

/**
 * @Form\Form
 */
final class ClassWithSanitizerAnnotations
{
    /**
     * @Sanitizers\Trim
     */
    private $fullName;
}