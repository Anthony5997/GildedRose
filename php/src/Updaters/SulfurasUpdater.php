<?php

namespace App\Updaters;

use App\Item;
use App\Updaters\ItemUpdater;

class SulfurasUpdater extends ItemUpdater
{
	function __construct($item)
    {
        $this->item = $item;
    }

    public function __toString()
    {
        return "{$this->item}";
    }

     public function update()
    {
      $this->item->quality = 80;
    }

    public static function resolve(Item $item){
        return ($item->name === "Sulfuras, Hand of Ragnaros");
    }

    public static function getMyInstance($item){
        return new SulfurasUpdater($item);
    } 

}
