<?php

use alexeevdv\personalid\indonesia\Builder;
use alexeevdv\personalid\indonesia\Identity;
use alexeevdv\personalid\indonesia\Validator;

/**
 * Class BuilderTest
 */
class BuilderTest extends \Codeception\Test\Unit
{
    /**
     * @test
     */
    public function testRandom()
    {
        $builder = new Builder;
        $nik = $builder->random();

        $validator = new Validator;
        $this->assertTrue($validator->validate($nik));
    }

    /**
     * @param integer $province
     * @param integer $district
     * @param integer $subDistrict
     * @param integer $gender
     * @param string $birthDate
     * @param int $serial
     * @param string $nik
     * @dataProvider fromIdentityDataProvider
     */
    public function testFromIdentity($province, $district, $subDistrict, $gender, $birthDate, $serial, $nik)
    {
        $identity = new Identity;
        $identity->setProvinceCode($province);
        $identity->setDistrictCode($district);
        $identity->setSubDistrictCode($subDistrict);
        $identity->setGender($gender);
        $identity->setBirthDate(DateTimeImmutable::createFromFormat('Y-m-d', $birthDate));
        $identity->setSerial($serial);

        $builder = new Builder;
        $this->assertEquals($nik, $builder->fromIdentity($identity));
    }

    /**
     * @return array
     */
    public function fromIdentityDataProvider()
    {
        return [
            [11, 1, 1, Identity::GENDER_MALE, '1978-04-04', 123, '1101010404780123'],
            [11, 1, 1, Identity::GENDER_FEMALE, '1978-04-04', 123, '1101014404780123'],
        ];
    }
}
