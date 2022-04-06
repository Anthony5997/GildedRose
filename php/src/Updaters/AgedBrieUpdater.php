<?php

namespace App\Updaters;

use App\Updaters\ItemUpdater;
use App\Item;

class AgedBrieUpdater extends ItemUpdater
{
    /*TODO*/

    function __construct($item)
    {
        $this->item = $item;
    }

    public function __toString()
    {
        return "{$this->item}";
    }

    public function updateSellIn()
    {
        $this->item->sell_in -= 1;
    }
    
    public function updateQuality()
    {
        $this->increaseQuality();
    }

    protected function increaseQuality()
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

    public function update()
    {
        $this->updateSellIn();
        $this->updateQuality();
    }

    protected function updateExpired()
    {
        if($this->item->sell_in < 0){
            return false;
          }else{
            return true;
          }
    }

    public static function resolve(Item $item){
        return ($item->name === "Aged Brie");
    }

    public static function getMyInstance($item){
        return new AgedBrieUpdater($item);
    } 
}