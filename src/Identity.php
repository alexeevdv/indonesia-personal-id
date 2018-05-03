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
    private $_gender;

    /**
     * @var DateTimeImmutable
     */
    private $_birthDate;

    /**
     * @var string
     */
    private $_provinceCode;

    /**
     * @var string
     */
    private $_districtCode;

    /**
     * @var string
     */
    private $_subDistrictCode;

    /**
     * @var string
     */
    private $_serial;

    /**
     * @inheritdoc
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param integer $gender
     * @return $this
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBirthDate()
    {
        return $this->_birthDate;
    }

    /**
     * @param DateTimeImmutable $date
     * @return $this
     */
    public function setBirthDate($date)
    {
        $this->_birthDate = $date;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getProvinceCode()
    {
        return $this->_provinceCode;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setProvinceCode($code)
    {
        $this->_provinceCode = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getDistrictCode()
    {
        return $this->_districtCode;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setDistrictCode($code)
    {
        $this->_districtCode = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSubDistrictCode()
    {
        return $this->_subDistrictCode;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setSubDistrictCode($code)
    {
        $this->_subDistrictCode = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSerial()
    {
        return $this->_serial;
    }

    /**
     * @param string $serial
     * @return $this
     */
    public function setSerial($serial)
    {
        $this->_serial = $serial;
        return $this;
    }
}
