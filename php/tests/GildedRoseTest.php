<?php

declare(strict_types=1);

namespace Tests;


class GildedRoseTest extends \PHPUnit\Framework\TestCase
{
    public function testFoo(): void
    {
        $items = [new \App\Item('foo', 0, 0)];
        $gildedRose = new \App\GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }
}
