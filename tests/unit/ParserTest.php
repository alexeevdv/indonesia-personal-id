<?php

use alexeevdv\personalid\indonesia\Identity;
use alexeevdv\personalid\indonesia\interfaces\IIdentity;
use alexeevdv\personalid\indonesia\Parser;

/**
 * Class ParserTest
 */
class ParserTest extends \Codeception\Test\Unit
{
    /**
     * @param int $province
     * @param int $district
     * @param int $subDistrict
     * @param int $gender
     * @param string $birthDate
     * @param int $serial
     * @param string $nik
     * @dataProvider parseDataProvider
     */
    public function testParse($province, $district, $subDistrict, $gender, $birthDate, $serial, $nik)
    {
        $parser = new Parser;
        $identity = $parser->parse($nik);
        $this->assertInstanceOf(IIdentity::class, $identity);
        $this->assertEquals($province, $identity->provinceCode());
        $this->assertEquals($district, $identity->districtCode());
        $this->assertEquals($subDistrict, $identity->subDistrictCode());
        $this->assertEquals($gender, $identity->gender());
        $this->assertEquals($birthDate, $identity->birthDate()->format('Y-m-d'));
        $this->assertEquals($serial, $identity->serial());
    }

    /**
     * @return array
     */
    public function parseDataProvider()
    {
        return [
            [11, 1, 1, Identity::GENDER_MALE, '1978-04-04', 123, '1101010404780123'],
            [11, 1, 1, Identity::GENDER_FEMALE, '1978-04-04', 123, '1101014404780123'],
        ];
    }
}
