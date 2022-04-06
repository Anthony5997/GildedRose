<?php

namespace App;
use App\UpdatersInterface;


final class GildedRose
{
    private $items = [];
    private $directory;

    public function __construct($items, DirectoryFactories $directoryFactories)
    {
        $this->items = $items;
        $this->directory = $directoryFactories;
    }

    public function updateQuality():void
    {
        foreach ($this->items as $item) {
            $this->updateItem($item);
        }
    }


    public function updateItem($item):void
    {
        $updaterToInstanciate =  $this->directory->itemClassifier->categorize($item);
        $instance = $this->directory->updater->create($updaterToInstanciate, $item);
       
        $instance->update();
    }
    

}