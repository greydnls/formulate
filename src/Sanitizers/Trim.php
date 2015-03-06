<?php namespace Kayladnls\Formulate\Sanitizers;
/**
 * Created by PhpStorm.
 * User: kayladnls
 * Date: 1/13/15
 * Time: 10:24 PM
 */

class Trim implements Sanitizer
{
    public function sanitize($value)
    {
        return trim($value);
    }

} 