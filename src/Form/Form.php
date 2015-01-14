<?php namespace NoShinyUnicorn\Formulate\Form;
/**
 * Created by PhpStorm.
 * User: kayladnls
 * Date: 1/12/15
 * Time: 11:33 PM
 */

namespace NoShinyUnicorn\Formulate\Form;


use NoShinyUnicorn\Formulate\Form\Fields\Field;
use NoShinyUnicorn\Formulate\Validator\Validatable;

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

    public function getField($argument1)
    {
        foreach ($this->fields as $k => $field)
        {
            if ($k == $argument1) return $field;
        }
    }
}
