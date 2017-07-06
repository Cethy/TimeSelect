<?php

namespace Cethyworks\TimeSelect\Tests\Form;

use Cethyworks\TimeSelect\Form\TimeSelectType;
use Symfony\Component\Form\ChoiceList\View\ChoiceView;
use Symfony\Component\Form\Test\TypeTestCase;

class TimeSelectTypeTest extends TypeTestCase
{
    public function testDefaultChoiceValues()
    {
        $type = $this->factory->create(TimeSelectType::class);

        $view = $type->createView();

        $expectedChoices = [];
        for($hour = 0; $hour < 24; $hour++) {
            for($minute = 0; $minute < 60; $minute += 15) {
                $value = sprintf('%02d:%02d', $hour, $minute);
                $expectedChoices[] = new ChoiceView($value, $value, $value);
            }
        }

        $this->assertEquals($expectedChoices, $view->vars['choices']);
    }
}
