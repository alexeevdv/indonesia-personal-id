<?php

namespace alexeevdv\personalid\indonesia\interfaces;

/**
 * Interface IValidator
 * @package alexeevdv\personalid\indonesia\interfaces
 */
interface IValidator
{
    /**
     * @param string $nik
     * @return boolean
     */
    public function validate($nik);
}
