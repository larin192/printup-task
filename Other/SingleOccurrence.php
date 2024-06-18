<?php

namespace Other;

class SingleOccurrence {
    public function findSingle(array $elements): array
    {
        $occurrences = [];

        foreach ($elements as $element) {
            $occurrences[(string) $element]++;
        }

        $unique = array_filter($occurrences, function($element) {
            return $element === 1;
        });

        return array_keys($unique);
    }
}