<?php

namespace Tests;

use Ciphers\AtbashCipher;
use PHPUnit\Framework\TestCase;

class AtbashCipherTest extends TestCase
{
    private AtbashCipher $cipher;

    protected function setUp(): void
    {
        $this->cipher = new AtbashCipher();
    }

    public function testEncryptWithLowercase()
    {
        $this->assertEquals('svool dliow', $this->cipher->encrypt('hello world'));
    }

    public function testEncryptWithUppercase()
    {
        $this->assertEquals('SVOOL DLIOW', $this->cipher->encrypt('HELLO WORLD'));
    }

    public function testEncryptWithMixedCase()
    {
        $this->assertEquals('Svool Dliow', $this->cipher->encrypt('Hello World'));
    }

    public function testEncryptWithSpecialCharacters()
    {
        $this->assertEquals('Svool, Dliow!', $this->cipher->encrypt('Hello, World!'));
    }

    public function testDecryptWithLowercase()
    {
        $this->assertEquals('hello world', $this->cipher->decrypt('svool dliow'));
    }

    public function testDecryptWithUppercase()
    {
        $this->assertEquals('HELLO WORLD', $this->cipher->decrypt('SVOOL DLIOW'));
    }

    public function testDecryptWithMixedCase()
    {
        $this->assertEquals('Hello World', $this->cipher->decrypt('Svool Dliow'));
    }

    public function testDecryptWithSpecialCharacters()
    {
        $this->assertEquals('Hello, World!', $this->cipher->decrypt('Svool, Dliow!'));
    }

    public function testEncryptAndDecrypt()
    {
        $originalText = 'Testing 123!';
        $encryptedText = $this->cipher->encrypt($originalText);
        $decryptedText = $this->cipher->decrypt($encryptedText);
        $this->assertEquals($originalText, $decryptedText);
    }
}