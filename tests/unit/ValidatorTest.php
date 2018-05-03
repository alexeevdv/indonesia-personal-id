<?php

use alexeevdv\personalid\indonesia\Validator;

/**
 * Class ValidatorTest
 */
class ValidatorTest extends \Codeception\Test\Unit
{
    /**
     * @param string $nik
     * @param boolean $expectedResult
     * @dataProvider validationDataProvider
     */
    public function testValidate($nik, $expectedResult)
    {
        $validator = new Validator;
        $this->assertEquals($expectedResult, $validator->validate($nik));
    }

    /**
     * @return array
     */
    public function validationDataProvider()
    {
        return [
            'empty nik' => ['', false],
            'too short nik' => ['1234567890', false],
            'too long nik' => ['12345678901234567890', false],
            'valid value' => ['1101014102880231', true],
            'wrong province code' => ['9901014102880231', false],
        ];
    }
}
