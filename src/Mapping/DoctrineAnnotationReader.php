<?php namespace NoShinyUnicorn\Formulate\Mapping;

use Doctrine\Common\Annotations\AnnotationReader as Reader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use NoShinyUnicorn\Formulate\Mapping\Fields\Field;
use NoShinyUnicorn\Formulate\Mapping\Form\Form;
use NoShinyUnicorn\Formulate\Mapping\Rules\Rule;
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
        AnnotationRegistry::registerFile(__DIR__.'/Fields/Integer.php');
        AnnotationRegistry::registerFile(__DIR__.'/Rules/Required.php');
        AnnotationRegistry::registerFile(__DIR__.'/Rules/MaxLength.php');
        AnnotationRegistry::registerFile(__DIR__.'/Rules/AtLeastOneRequired.php');
        AnnotationRegistry::registerFile(__DIR__.'/Form/Form.php');
    }

    public function read(ReflectionClass $reflection)
    {
        if (!$this->isAForm($reflection)) throw new \Exception('The Class you are attempting to read is not a Form');

        foreach ($reflection->getProperties() as $property)
        {
            $this->handleProperty($property);
        }

        $this->handleClass($reflection);

        return $this->annotations;
    }

    private function isAForm(ReflectionClass $reflection)
    {
        $class_annotations = $this->reader->getClassAnnotations($reflection);
        return array_shift($class_annotations) instanceof Form;
    }

    private function handleClass(ReflectionClass $reflection)
    {
        $class_annotations = $this->reader->getClassAnnotations($reflection);
        array_shift($class_annotations);
        foreach ($class_annotations as $annotation)
        {
            if ($annotation instanceof Rule)
            {
                $reflect = new ReflectionClass($annotation);
                $this->annotations['form']['rules'][$reflect->getShortName()] = $annotation;
            }
        }
    }

    private function handleProperty(ReflectionProperty $property)
    {
        foreach ($this->reader->getPropertyAnnotations($property) as $annotation)
        {
            if ($this->isAnnotationAllowed($annotation))
            {
                $this->storeAnnotation($property, $annotation);
            }
        }
    }

    private function isAnnotationAllowed(Annotation $annotation)
    {
        if($annotation instanceof Field) return true;
        if($annotation instanceof Rule) return true;
        return false;
    }

    private function storeAnnotation(ReflectionProperty $property, Annotation $annotation)
    {
        $this->storeFieldAnnotation($property, $annotation);
        $this->storeRuleAnnotation($property, $annotation);
    }

    private function storeRuleAnnotation($property, $annotation)
    {
        if ($annotation instanceof Rule)
        {
            $reflect = new ReflectionClass($annotation);
            $this->annotations[$property->getName()]['rules'][$reflect->getShortName()] = $annotation;
        }
    }


    private function storeFieldAnnotation(ReflectionProperty $property, Annotation $annotation)
    {
        if ($annotation instanceof Field)
        {
            if (isset($this->annotations[$property->getName()]['field']))
            {
                throw new \Exception('Cannot set two field annotations for ' . $property->getName());
            }
            $this->annotations[$property->getName()]['field'] = $annotation;
        }
    }
}
