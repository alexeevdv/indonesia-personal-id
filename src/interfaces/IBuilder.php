<?php

namespace alexeevdv\personalid\indonesia\interfaces;

/**
 * Interface IBuilder
 * @package alexeevdv\personalid\indonesia\interfaces
 */
interface IBuilder
{
    /**
     * Generates random NIK
     * @return string
     */
    public function random();

    /**
     * @param IIdentity $identity
     * @return string
     */
    public function fromIdentity(IIdentity $identity);
}
