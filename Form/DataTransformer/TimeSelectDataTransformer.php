<?php

namespace Cethyworks\TimeSelect\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class TimeSelectDataTransformer implements DataTransformerInterface
{
    /**
     * Transforms from entity value to form view
     *
     * @param null|\DateTime $time
     * @return string
     */
    public function transform($time)
    {
        if($time instanceof \DateTime) {
            return $time->format('H:i');
        }

        return null;
    }

    /**
     * Transforms from form view to entity value
     *
     * @param string $value
     * @return \DateTime
     */
    public function reverseTransform($value)
    {
        return \DateTime::createFromFormat('Y-m-d H:i', '1970-01-01 '. $value);
    }
}
