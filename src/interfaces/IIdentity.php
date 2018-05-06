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
    public function gender();

    /**
     * @return DateTimeImmutable
     */
    public function birthDate();

    /**
     * @return string
     */
    public function provinceCode();

    /**
     * @return string
     */
    public function districtCode();

    /**
     * @return string
     */
    public function subDistrictCode();

    /**
     * @return string
     */
    public function serial();
}
