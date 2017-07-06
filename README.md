Cethyworks\TimeSelect
===
Provides a SelectType containing a selection of possible time values, from 00:00 to 23:45.

## How to use

    namespace ExampleBundle\Form;
    
    use Cethyworks\TimeSelect\Form\TimeSelectType;

    class ExampleType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('exampleTime', TimeSelectType::class)
                // ...
            ;
        }
        // ...
    }

## Todo
- add options
