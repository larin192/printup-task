<?php

namespace Tests;

use Other\SingleOccurrence;
use PHPUnit\Framework\TestCase;

class SingleOccurrenceTest extends TestCase {

    protected SingleOccurrence $singleOccurrence;

    protected function setUp(): void
    {
        $this->singleOccurrence = new SingleOccurrence();
    }

    public function testSingleOccurrenceWithEmptyArray() {
        $this->assertEquals([], $this->singleOccurrence->findSingle([]));
    }

    public function testSingleOccurrenceWithIntegers() {
        $data = [3, 3, 5, 8, 8, 9];
        $unique = [5, 9];

        $this->assertEquals($unique, $this->singleOccurrence->findSingle($data));
    }

    public function testSingleOccurrenceWithFloats() {
        $data = [2.5, 1.3, 6.5, 5, 5.1, 33.39999, 33.4, 1.3];
        $unique = [2.5, 6.5, 5, 5.1, 33.39999, 33.4];

        $this->assertEquals($unique, $this->singleOccurrence->findSingle($data));
    }
}