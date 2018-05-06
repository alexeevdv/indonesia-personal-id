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
        $genders = [Identity::GENDER_MALE, Identity::GENDER_FEMALE];
        shuffle($genders);
        $gender = reset($genders);

        $birthDate = DateTimeImmutable::createFromFormat('U', mt_rand(1, strtotime('-18 years')));

        $provinceCodes = $this->codesProvider->provinceCodes();
        shuffle($provinceCodes);
        $provinceCode = reset($provinceCodes);

        $identity = new Identity(
            $gender,
            $birthDate,
            $provinceCode,
            // TODO set random value
            '01',
            // TODO set random value
            '01',
            mt_rand(1, 9999)
        );

        return $this->fromIdentity($identity);
    }

    /**
     * @inheritdoc
     */
    public function fromIdentity(IIdentity $identity)
    {
        $birthday = $identity->birthDate()->format('d');
        if ($identity->gender() === IIdentity::GENDER_FEMALE) {
            $birthday += 40;
        }
        $birthDate = $birthday . $identity->birthDate()->format('my');

        return ''
            . sprintf("%02d", $identity->provinceCode())
            . sprintf("%02d", $identity->districtCode())
            . sprintf("%02d", $identity->subDistrictCode())
            . $birthDate
            . sprintf("%04d", $identity->serial())
        ;
    }
}
