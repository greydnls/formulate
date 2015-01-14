<?php namespace Kayladnls\Formulate\Mapping;

use ReflectionClass;

interface AnnotationReader
{
    public function read(ReflectionClass $reflection);
} 