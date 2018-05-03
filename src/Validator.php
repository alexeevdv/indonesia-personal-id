<?php

namespace alexeevdv\personalid\indonesia;

use alexeevdv\personalid\indonesia\interfaces\ILocalityCodesProvider;
use alexeevdv\personalid\indonesia\interfaces\IValidator;

/**
 * Class Validator
 * @package alexeevdv\personalid\indonesia
 */
class Validator implements IValidator
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
    public function validate($nik)
    {
        // Length should be equal 16
        if (strlen($nik) !== 16) {
            return false;
        }

        // TODO nik should consist only of numbers

        // First two digits should be valid province code
        $provinceCode = substr($nik, 0, 2);
        if (!in_array($provinceCode, $this->codesProvider->getProvinceCodes())) {
            return false;
        }

        // TODO next 4 digits should be valid sub-locality code
        // $districtCode = substr($nik, 2, 2);
        // $subDistrictCode = substr($nik, 4, 2);

        // TODO next 6 digits should be valid date. in case of Female gender day should have +40 value

        // TODO last 4 digits are serial number

        return true;
    }
}
