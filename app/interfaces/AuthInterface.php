<?php

interface AuthInterface
{
    /**
     * Define auth interface.
     *
     * @return void
     */

    public function _doRegister($name, $email, $phone_number, $address, $password): void;

    /**
     * Define auth interface.
     *
     * @return void
     */

    public function _doLogin($email, $password): void;
}
