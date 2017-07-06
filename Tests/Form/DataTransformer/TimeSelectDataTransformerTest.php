<?php

namespace Cethyworks\TimeSelect\Form\DataTransformer;

use PHPUnit\Framework\TestCase;

class TimeSelectDataTransformerTest extends TestCase
{
    protected function getData()
    {
        $data = [
            '00:00',
            '01:15',
            '12:45',
            '23:30'
        ];

        return array_map(function($value) {
            return [\DateTime::createFromFormat('Y-m-d H:i', '1970-01-01 '. $value), $value];
        }, $data);
    }

    public function dataTestTransform()
    {
        return array_map(function($data) {
            return [
                'time'          => $data[0],
                'expectedValue' => $data[1],
            ];
        }, $this->getData());
    }

    public function dataTestReverseTransform()
    {
        return array_map(function($data) {
            return [
                'expectedTime' => $data[0],
                'value'        => $data[1],
            ];
        }, $this->getData());
    }

    /**
     * @dataProvider dataTestTransform
     */
    public function testTransform($time, $exceptedValue)
    {
        $transformer = new TimeSelectDataTransformer();

        $this->assertEquals(
            $exceptedValue,
            $transformer->transform($time)
        );
    }

    /**
     * @dataProvider dataTestReverseTransform
     */
    public function testReverseTransform($exceptedTime, $value)
    {
        $transformer = new TimeSelectDataTransformer();

        $this->assertEquals(
            $exceptedTime,
            $transformer->reverseTransform($value)
        );
    }
}
