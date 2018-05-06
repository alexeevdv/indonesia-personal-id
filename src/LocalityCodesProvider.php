<?php

namespace alexeevdv\personalid\indonesia;

use alexeevdv\personalid\indonesia\interfaces\ILocalityCodesProvider;

/**
 * Class LocalityCodesProvider
 * @package alexeevdv\personalid\indonesia
 */
class LocalityCodesProvider implements ILocalityCodesProvider
{
    /**
     * @return array
     */
    public function provinceCodes()
    {
        return [
            '11', '12', '13', '14', '15', '16', '17', '18', '19', '21', '31', '32', '33', '34', '35', '36', '51',
            '52', '53', '61', '62', '63', '64', '71', '72', '73', '74', '75', '76', '81', '82', '91', '94',
        ];
    }
}
