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
     * @inheritdoc
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param integer $gender
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param DateTimeImmutable $date
     * @return $this
     */
    public function setBirthDate($date)
    {
        $this->birthDate = $date;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getProvinceCode()
    {
        return $this->provinceCode;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setProvinceCode($code)
    {
        $this->provinceCode = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getDistrictCode()
    {
        return $this->districtCode;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setDistrictCode($code)
    {
        $this->districtCode = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSubDistrictCode()
    {
        return $this->subDistrictCode;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setSubDistrictCode($code)
    {
        $this->subDistrictCode = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @param string $serial
     * @return $this
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
        return $this;
    }
}
