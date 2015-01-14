<?php namespace Kayladnls\Formulate\Mapping\Rules;

/**
 * @Annotation
 */
final class AtLeastOneRequired extends MultipleFieldsRule implements Rule
{
    function __construct($fields)
    {
        $this->fields = $fields['fields'];
    }
}