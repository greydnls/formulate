<?php namespace Kayladnls\Formulate\Form;

use Kayladnls\Formulate\Mapping\AnnotationReader;

class FormCreator
{
    private $reader;

    function __construct(AnnotationReader $reader)
    {
        $this->reader = $reader;
    }

    public function create($mappable_object)
    {
        $this->createFromMap($mappable_object);
    }

    private function createFromMap($map)
    {
        $map = $this->reader->read($map);
    }
}
