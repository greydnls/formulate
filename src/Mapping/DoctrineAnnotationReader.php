<?php namespace NoShinyUnicorn\Formulate\Mapping;

use Doctrine\Common\Annotations\AnnotationReader as Reader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use NoShinyUnicorn\Formulate\Mapping\Fields\Field;
use ReflectionClass;
use ReflectionProperty;

class DoctrineAnnotationReader implements AnnotationReader
{
    /**
     * @var Reader
     */
    private $reader;
    private $annotations = [];

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
        AnnotationRegistry::registerFile(__DIR__.'/Fields/Text.php');
    }

    public function read(ReflectionClass $reflection)
    {
        foreach ($reflection->getProperties() as $property)
            $this->handleProperty($property);
        return $this->annotations;
    }

    private function handleProperty(ReflectionProperty $property)
    {
        foreach ($this->reader->getPropertyAnnotations($property) as $annotation)
            if ($this->isAnnotationAllowed($annotation))
                $this->storeAnnotation($property, $annotation);
    }

    private function isAnnotationAllowed(Annotation $annotation)
    {
        return $annotation instanceof Field;
    }

    private function storeAnnotation(ReflectionProperty $property, Annotation $annotation)
    {
        $this->annotations[$property->getName()]['field'] = $annotation;
    }
}
