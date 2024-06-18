<?php

namespace Ciphers;

class AtbashCipher
{
    private array $alphabet = [];
    private array $reversedAlphabet = [];

    public function __construct()
    {
        $this->alphabet = range('a', 'z');
        $this->reversedAlphabet = array_reverse($this->alphabet);
    }

    public function encrypt(string $text): string
    {
        return $this->handle($text);
    }

    public function decrypt(string $text): string
    {
        return $this->handle($text);
    }

    private function handle(string $text): string
    {
        $encryptedText = '';

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];

            if (ctype_lower($char)) {
                $index = array_search($char, $this->alphabet);
                $encryptedText .= $this->reversedAlphabet[$index];
            } elseif (ctype_upper($char)) {
                $lowerChar = strtolower($char);
                $index = array_search($lowerChar, $this->alphabet);
                $encryptedText .= strtoupper($this->reversedAlphabet[$index]);
            } else {
                $encryptedText .= $char;
            }
        }

        return $encryptedText;
    }
}
