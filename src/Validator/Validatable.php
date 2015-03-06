<?php namespace Kayladnls\Formulate\Validator;

use Kayladnls\Formulate\Validator\Rules\Rule;

trait Validatable
{
    protected $rules = array();

    public function addNewRule(Rule $rule)
    {
        $rule = new \ReflectionClass($rule);
        $this->rules[$rule->getShortName()] = $rule;
    }

    public function removeRule($rule_name)
    {
        unset($this->rules[$rule_name]);
    }

    public function getRules()
    {
        return $this->rules;
    }
} 