<?php
/**
 * Created by PhpStorm.
 * User: kayladnls
 * Date: 1/12/15
 * Time: 11:13 PM
 */

namespace Kayladnls\Formulate\Mapping\Rules;


abstract class MultipleFieldsRule
{
    protected $fields;

    public function getFields()
    {
        return $this->fields;
    }

    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }
} 