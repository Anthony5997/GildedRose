<?php

namespace App;

use App\ItemClassifier;

final class GildedRose
{
    private $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $this->updateItem($item);
        }
    }


    public function updateItem($item)
    {
        $classifier = new ItemClassifier();

        $updater = $classifier->categorize($item);
       
        $updater->update();
    }
    

}