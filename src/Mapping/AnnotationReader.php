<?php namespace NoShinyUnicorn\Formulate\Mapping;

use ReflectionClass;

interface AnnotationReader
{
    public function read(ReflectionClass $reflection);
} 