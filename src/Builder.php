<?php

namespace alexeevdv\personalid\indonesia;

use alexeevdv\personalid\indonesia\interfaces\IBuilder;
use alexeevdv\personalid\indonesia\interfaces\IIdentity;
use alexeevdv\personalid\indonesia\interfaces\ILocalityCodesProvider;
use DateTimeImmutable;

/**
 * Class Builder
 * @package alexeevdv\personalid\indonesia
 */
class Builder implements IBuilder
{
    /**
     * @var ILocalityCodesProvider
     */
    private $codesProvider;

    /**
     * Validator constructor.
     * @param ILocalityCodesProvider $codesProvider
     */
    public function __construct(ILocalityCodesProvider $codesProvider = null)
    {
        if ($codesProvider === null) {
            $codesProvider = new LocalityCodesProvider;
        }
        $this->codesProvider = $codesProvider;
    }

    /**
     * @inheritdoc
     */
    public function random()
    {
        $identity = new Identity;

        $provinceCodes = $this->codesProvider->getProvinceCodes();
        shuffle($provinceCodes);
        $identity->setProvinceCode(reset($provinceCodes));

        // TODO set random value
        $identity->setDistrictCode('01');

        // TODO set random value
        $identity->setSubDistrictCode('01');

        $date = date('Y-m-d', mt_rand(1, strtotime('-18 years')));
        $identity->setBirthDate(DateTimeImmutable::createFromFormat('Y-m-d', $date));

        $genders = [Identity::GENDER_MALE, Identity::GENDER_FEMALE];
        shuffle($genders);
        $identity->setGender(reset($genders));

        $identity->setSerial(mt_rand(1, 9999));

        return $this->fromIdentity($identity);
    }

    /**
     * @inheritdoc
     */
    public function fromIdentity(IIdentity $identity)
    {
        $birthday = $identity->getBirthDate()->format('d');
        if ($identity->getGender() === IIdentity::GENDER_FEMALE) {
            $birthday += 40;
        }
        $birthdate = $birthday . $identity->getBirthDate()->format('my');

        return ''
            . sprintf("%02d", $identity->getProvinceCode())
            . sprintf("%02d", $identity->getDistrictCode())
            . sprintf("%02d", $identity->getSubDistrictCode())
            . $birthdate
            . sprintf("%04d", $identity->getSerial())
        ;
    }
}
