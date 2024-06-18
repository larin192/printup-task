<?php

namespace Ciphers;

abstract class Cipher implements CiphersContract {

    public abstract function encrypt(string $plaintext): string;
    public abstract function decrypt(string $plaintext): string;

}