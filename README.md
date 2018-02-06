Cethyworks\TimeSelect
===
Provides a SelectType containing a selection of possible time values, from `00:00` to `23:45` (with a default 15 minutes step).

[![CircleCI](https://circleci.com/gh/Cethy/TimeSelect/tree/master.svg?style=shield)](https://circleci.com/gh/Cethy/TimeSelect/tree/master)

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

## Options

### Change the input' starting value
Overrides the choices array :

    // ...
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('exampleTime', TimeSelectType::class, [
                'choices' => TimeSelectType::generateChoices(8, 45, 5, 2),
            )
            // ...
        ;
    }
    // ...
In this example, the input will start at 8:45 (and end at 8:30), with a 5 minutes step and a 2 hours step.
