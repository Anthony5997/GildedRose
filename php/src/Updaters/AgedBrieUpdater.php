<?php

namespace App\Updaters;

use App\Updaters\ItemUpdater;
use App\Item;

class AgedBrieUpdater extends ItemUpdater
{
    /*TODO*/

    function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function __toString():string
    {
        return "{$this->item}";
    }

    public function updateSellIn():void
    {
        $this->item->sell_in -= 1;
    }
    
    public function updateQuality():void
    {
        $this->increaseQuality();
    }

    protected function increaseQuality():void
    {
        if($this->item->quality < 50){
            if($this->updateExpired()){
                $this->item->quality += 1;
            }else{
                $this->item->quality +=  2;
            }
        }else{
            $this->item->quality =  50;
        }
    }

    public function update():void
    {
        $this->updateSellIn();
        $this->updateQuality();
    }

    protected function updateExpired():bool
    {
        if($this->item->sell_in < 0){
            return false;
          }else{
            return true;
          }
    }

    public static function resolve($item):bool
    {
        return ($item->name === "Aged Brie");
    }

    public static function getInstance($item):self
    {
        return new AgedBrieUpdater($item);
    } 
}