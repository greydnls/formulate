<?php namespace Kayladnls\Formulate\Form;

use Kayladnls\Formulate\Mapping\AnnotationReader;

class FormBuilder
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
        $map = $this->reader->readFromMappable($map);

        if (!isset($map['form']['fields']) || !is_array($map['form']['fields']))
        {
            throw new \Exception('Form has no fields');
        }
    }
}
