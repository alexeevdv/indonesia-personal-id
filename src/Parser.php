<?php

namespace alexeevdv\personalid\indonesia;

use alexeevdv\personalid\indonesia\interfaces\IParser;
use DateTimeImmutable;

/**
 * Class Parser
 * @package alexeevdv\personalid\indonesia
 */
class Parser implements IParser
{
    /**
     * @inheritdoc
     */
    public function parse($nik)
    {
        $identity = new Identity;

        // XX..............
        $provinceCode = substr($nik, 0, 2);
        $identity->setProvinceCode($provinceCode);

        // ..XX............
        $districtCode = substr($nik, 2, 2);
        $identity->setDistrictCode($districtCode);

        // ....XX..........
        $subDistrictCode = substr($nik, 4, 2);
        $identity->setSubDistrictCode($subDistrictCode);

        // ......XX........
        $birthDay = substr($nik, 6, 2);
        if ($birthDay > 40) {
            $identity->setGender(Identity::GENDER_FEMALE);
            $birthDay = $birthDay - 40;
        } else {
            $identity->setGender(Identity::GENDER_MALE);
        }

        // ........XXXX....
        $birthDate = DateTimeImmutable::createFromFormat('dmy', $birthDay . substr($nik, 8, 4));
        $identity->setBirthDate($birthDate);

        // ............XXXX
        $serial = substr($nik, 12, 4);
        $identity->setSerial($serial);

        return $identity;
    }
}
