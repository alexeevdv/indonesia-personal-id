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
        // XX..............
        $provinceCode = substr($nik, 0, 2);

        // ..XX............
        $districtCode = substr($nik, 2, 2);

        // ....XX..........
        $subDistrictCode = substr($nik, 4, 2);

        // ......XX........
        $birthDay = substr($nik, 6, 2);
        if ($birthDay > 40) {
            $gender = Identity::GENDER_FEMALE;
            $birthDay = sprintf("%02d", $birthDay - 40);
        } else {
            $gender = Identity::GENDER_MALE;
        }

        // ........XXXX....
        $birthDate = DateTimeImmutable::createFromFormat('dmy', $birthDay . substr($nik, 8, 4));

        // ............XXXX
        $serial = substr($nik, 12, 4);

        return new Identity(
            $gender,
            $birthDate,
            $provinceCode,
            $districtCode,
            $subDistrictCode,
            $serial
        );
    }
}
