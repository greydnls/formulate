<?php namespace Kayladnls\Formulate\Form;
/**
 * Created by PhpStorm.
 * User: kayladnls
 * Date: 1/12/15
 * Time: 11:33 PM
 */

namespace Kayladnls\Formulate\Form;


use Kayladnls\Formulate\Fields\Field;
use Kayladnls\Formulate\Validator\Rules\Form\FormRule;
use Kayladnls\Formulate\Validator\Validatable;

class Form
{
    use Validatable;

    protected $fields;

    public function __construct()
    {
        $this->fields = array();
        $this->rules = array();
    }

    public function addField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    public function addRule(FormRule $rule)
    {
        $this->addNewRule($rule);
    }

    public function getField($argument1)
    {
        foreach ($this->fields as $k => $field)
        {
            if ($k == $argument1) return $field;
        }
    }
}
