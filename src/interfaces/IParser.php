<?php

namespace alexeevdv\personalid\indonesia\interfaces;

/**
 * Interface IParser
 * @package alexeevdv\personalid\indonesia\interfaces
 */
interface IParser
{
    /**
     * @param string $nik
     * @return IIdentity
     */
    public function parse($nik);
}
