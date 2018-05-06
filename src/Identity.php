<?php

namespace alexeevdv\personalid\indonesia;

use alexeevdv\personalid\indonesia\interfaces\IIdentity;
use DateTimeImmutable;

/**
 * Class Identity
 * @package alexeevdv\personalid\indonesia
 */
class Identity implements IIdentity
{
    /**
     * @var int
     */
    private $gender;

    /**
     * @var DateTimeImmutable
     */
    private $birthDate;

    /**
     * @var string
     */
    private $provinceCode;

    /**
     * @var string
     */
    private $districtCode;

    /**
     * @var string
     */
    private $subDistrictCode;

    /**
     * @var string
     */
    private $serial;

    /**
     * Identity constructor.
     * @param integer $gender
     * @param DateTimeImmutable $birthDate
     * @param string $provinceCode
     * @param string $districtCode
     * @param string $subDistrictCode
     * @param string $serial
     */
    public function __construct($gender, $birthDate, $provinceCode, $districtCode, $subDistrictCode, $serial)
    {
        $this->gender = $gender;
        $this->birthDate = $birthDate;
        $this->provinceCode = $provinceCode;
        $this->districtCode = $districtCode;
        $this->subDistrictCode = $subDistrictCode;
        $this->serial = $serial;
    }

    /**
     * @inheritdoc
     */
    public function gender()
    {
        return $this->gender;
    }

    /**
     * @inheritdoc
     */
    public function birthDate()
    {
        return $this->birthDate;
    }

    /**
     * @inheritdoc
     */
    public function provinceCode()
    {
        return $this->provinceCode;
    }

    /**
     * @inheritdoc
     */
    public function districtCode()
    {
        return $this->districtCode;
    }

    /**
     * @inheritdoc
     */
    public function subDistrictCode()
    {
        return $this->subDistrictCode;
    }

    /**
     * @inheritdoc
     */
    public function serial()
    {
        return $this->serial;
    }
}
