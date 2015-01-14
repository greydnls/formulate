<?php namespace Kayladnls\Formulate\Validator;
/**
 * Created by PhpStorm.
 * User: kayladnls
 * Date: 1/13/15
 * Time: 12:40 AM
 */

trait Validatable
{
    protected $rules = array();

    public function addRule($rule)
    {
        $rule = new ReflectionClass($rule);
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