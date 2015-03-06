<?php namespace Kayladnls\Formulate\Fields;

use Kayladnls\Formulate\Validator\Rules\Field\FieldRule;
use Kayladnls\Formulate\Validator\Validatable;

/**
 * Created by PhpStorm.
 * User: kayladnls
 * Date: 1/12/15
 * Time: 11:38 PM
 */


abstract class AbstractField implements Field
{
    use Validatable;

    protected $name;
    protected $type;
    protected $value;

    function __construct($name)
    {
        $this->name = $name;
    }

    public function addRule(FieldRule $rule)
    {
        $this->addNewRule($rule);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
} 