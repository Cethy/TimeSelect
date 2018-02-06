<?php

namespace Cethyworks\TimeSelect\Form;

use Cethyworks\TimeSelect\Form\DataTransformer\TimeSelectDataTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimeSelectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new TimeSelectDataTransformer());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'choices' => $this->generateChoices()
        ]);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }


    /**
     * @param int $startHour
     * @param int $startMinute
     * @param int $minuteStep
     * @param int $hourStep
     * @return array
     */
    public static function generateChoices($startHour = 0, $startMinute = 0, $minuteStep = 15, $hourStep = 1)
    {
        $hours   = range(0, 23, $hourStep);
        $minutes = range(0, 59, $minuteStep);

        $choices = [];
        $tailChoices = [];
        foreach($hours as $hour) {
            foreach($minutes as $minute) {
                $value = sprintf('%02d:%02d', $hour, $minute);

                if(($hour == $startHour && $minute >= $startMinute) || $hour > $startHour) {
                    $choices[$value] = $value;
                }
                else {
                    $tailChoices[$value] = $value;
                }
            }
        }

        return array_merge($choices, $tailChoices);
    }
}
