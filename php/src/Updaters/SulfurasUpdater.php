<?php

namespace App\Updaters;

use App\Item;
use App\Updaters\ItemUpdater;
use App\Interfaces\UpdatersInterface;


class SulfurasUpdater extends ItemUpdater implements UpdatersInterface
{
	function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function __toString():string
    {
        return "{$this->item}";
    }

     public function update():void
    {
      $this->item->quality = 80;
    }

    public static function resolve(Item $item):bool
    {
        return ($item->name === "Sulfuras, Hand of Ragnaros");
    }

    public static function getInstance(Item $item):self
    {
        return new SulfurasUpdater($item);
    } 

}
