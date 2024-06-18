<?php

namespace Ciphers;

class BaconCipher
{
    private array $baconAlphabet = [
        'a' => 'AAAAA', 'b' => 'AAAAB', 'c' => 'AAABA', 'd' => 'AAABB', 'e' => 'AABAA',
        'f' => 'AABAB', 'g' => 'AABBA', 'h' => 'AABBB', 'i' => 'ABAAA', 'j' => 'ABAAB',
        'k' => 'ABABA', 'l' => 'ABABB', 'm' => 'ABBAA', 'n' => 'ABBAB', 'o' => 'ABBBA',
        'p' => 'ABBBB', 'q' => 'BAAAA', 'r' => 'BAAAB', 's' => 'BAABA', 't' => 'BAABB',
        'u' => 'BABAA', 'v' => 'BABAB', 'w' => 'BABBA', 'x' => 'BABBB', 'y' => 'BBAAA',
        'z' => 'BBAAB'
    ];

    private array $reverseBaconAlphabet = [];

    public function __construct()
    {
        $this->reverseBaconAlphabet = array_flip($this->baconAlphabet);
    }

    public function encrypt(string $text): string
    {
        $text = preg_replace('/[^a-z\s]/', '', strtolower($text));
        $text = preg_replace('/\s+/', ' ', $text);

        $encodedText = '';

        foreach (str_split($text) as $char) {
            $encodedText .= $this->baconAlphabet[$char] ?? ' ';
        }

        return $encodedText;
    }

    public function decrypt(string $text): string
    {
        $decodedText = '';
        $blocks = explode(' ', $text);

        foreach ($blocks as $key => $block) {
            foreach (str_split($block, 5) as $char) {
                $decodedText .= $this->reverseBaconAlphabet[$char] ?? '';
            }
            if ($key < count($blocks) - 1) {
                $decodedText .= ' ';
            }
        }

        return $decodedText;
    }
}