<?php

namespace Tests;

use Ciphers\CaesarCipher;
use PHPUnit\Framework\TestCase;

class CeasarCipherTest extends TestCase {

    public function testEncryptWithPositiveShift()
    {
        $cipher = new CaesarCipher(3);
        $this->assertEquals('Khoor Zruog', $cipher->encrypt('Hello World'));
    }

    public function testEncryptWithNegativeShift()
    {
        $cipher = new CaesarCipher(-3);
        $this->assertEquals('Ebiil Tloia', $cipher->encrypt('Hello World'));
    }

    public function testDecryptWithPositiveShift()
    {
        $cipher = new CaesarCipher(3);
        $this->assertEquals('Hello World', $cipher->decrypt('Khoor Zruog'));
    }

    public function testDecryptWithNegativeShift()
    {
        $cipher = new CaesarCipher(-3);
        $this->assertEquals('Hello World', $cipher->decrypt('Ebiil Tloia'));
    }

    public function testEncryptWithZeroShift()
    {
        $cipher = new CaesarCipher(0);
        $this->assertEquals('Hello World', $cipher->encrypt('Hello World'));
    }

    public function testDecryptWithZeroShift()
    {
        $cipher = new CaesarCipher(0);
        $this->assertEquals('Hello World', $cipher->decrypt('Hello World'));
    }

    public function testEncryptWithLargePositiveShift()
    {
        $cipher = new CaesarCipher(29);
        $this->assertEquals('Khoor Zruog', $cipher->encrypt('Hello World'));
    }

    public function testEncryptWithLargeNegativeShift()
    {
        $cipher = new CaesarCipher(-29);
        $this->assertEquals('Ebiil Tloia', $cipher->encrypt('Hello World'));
    }

    public function testEncryptWithSpecialCharacters()
    {
        $cipher = new CaesarCipher(3);
        $this->assertEquals('Khoor, Zruog!', $cipher->encrypt('Hello, World!'));
    }

    public function testDecryptWithSpecialCharacters()
    {
        $cipher = new CaesarCipher(3);
        $this->assertEquals('Hello, World!', $cipher->decrypt('Khoor, Zruog!'));
    }
}