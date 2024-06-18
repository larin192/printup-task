<?php

namespace Ciphers;

class CaesarCipher extends Cipher {

    protected int $shift;
    public function __construct(int $shift = 0)
    {
        $this->shift = $shift;
    }

    public function encrypt(string $text): string
    {
        return $this->handle($text, $this->shift);
    }

    public function decrypt(string $text): string
    {
        return $this->handle($text, -$this->shift);
    }

    private function handle(string $text, int $shift): string
    {
        $lowercase = range('a', 'z');
        $uppercase = range('A', 'Z');

        $shift = ($shift ?? $this->shift) % 26;

        $encryptedText = '';

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];

            if (ctype_lower($char)) {
                $index = array_search($char, $lowercase);
                $newIndex = ($index + $shift) % 26;
                if ($newIndex < 0) {
                    $newIndex += 26;
                }
                $encryptedText .= $lowercase[$newIndex];
            }
            elseif (ctype_upper($char)) {
                $index = array_search($char, $uppercase);
                $newIndex = ($index + $shift) % 26;
                if ($newIndex < 0) {
                    $newIndex += 26;
                }
                $encryptedText .= $uppercase[$newIndex];
            }
            else {
                $encryptedText .= $char;
            }
        }

        return $encryptedText;
    }
}
