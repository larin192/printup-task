<?php

namespace Tests;

use Ciphers\BaconCipher;
use PHPUnit\Framework\TestCase;

class BaconCipherTest extends TestCase
{
    private BaconCipher $cipher;

    protected function setUp(): void
    {
        $this->cipher = new BaconCipher();
    }

    public function testEncryptWithLowercase()
    {
        $this->assertEquals('AABBBAABAAABABBABABBABBBA', $this->cipher->encrypt('hello'));
    }

    public function testEncryptWithUppercase()
    {
        $this->assertEquals('AABBBAABAAABABBABABBABBBA', $this->cipher->encrypt('HELLO'));
    }

    public function testEncryptWithMixedCase()
    {
        $this->assertEquals('AABBBAABAAABABBABABBABBBA', $this->cipher->encrypt('HeLlO'));
    }

    public function testEncryptWithSpecialCharacters()
    {
        $this->assertEquals('AABBBAABAAABABBABABBABBBA BABBAABBBABAAABABABBAAABB', $this->cipher->encrypt('Hello, World!'));
    }

    public function testDecryptWithValidInput()
    {
        $this->assertEquals('hello world', $this->cipher->decrypt('AABBBAABAAABABBABABBABBBA BABBAABBBABAAABABABBAAABB'));
    }

    public function testEncryptAndDecrypt()
    {
        $originalText = 'Hello World';
        $encryptedText = $this->cipher->encrypt($originalText);
        $decryptedText = $this->cipher->decrypt($encryptedText);
        $this->assertEquals(strtolower($originalText), $decryptedText);
    }
}