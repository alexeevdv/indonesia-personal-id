<?php

namespace alexeevdv\personalid\indonesia\interfaces;

use DateTimeImmutable;

/**
 * Interface IIdentity
 * @package alexeevdv\personalid\indonesia\interfaces
 */
interface IIdentity
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /**
     * @return integer
     */
    public function getGender();

    /**
     * @return DateTimeImmutable
     */
    public function getBirthDate();

    /**
     * @return string
     */
    public function getProvinceCode();

    /**
     * @return string
     */
    public function getDistrictCode();

    /**
     * @return string
     */
    public function getSubDistrictCode();

    /**
     * @return string
     */
    public function getSerial();
}
