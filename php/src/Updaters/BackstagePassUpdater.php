<?php

namespace App\Updaters;

use App\Item;
use App\Updaters\ItemUpdater;

class BackstagePassUpdater extends ItemUpdater
{

    private int $quality_level;

    private function checkAndUpdateQualityLevel():void
    {
        if($this->item->sell_in  <= 5){
            $this->quality_level = 3;
        }elseif($this->item->sell_in  <= 10){
            $this->quality_level = 2;
        }else{
            $this->quality_level = 1; 
        }
    }

    protected function decreaseQuality():void
    {
      $this->item->quality = 0;
    }

    public function updateSellIn():void
    {
        $this->item->sell_in -= 1;
    }

    public function updateQuality():void
    {
        if($this->updateExpired()){
            $this->checkAndUpdateQualityLevel();
            $this->increaseQuality();
        }else{
            $this->decreaseQuality();
        }
    }

    protected function increaseQuality():void
    {
        if($this->item->quality < 50 && ($this->item->quality + $this->quality_level) < 50){
            $this->item->quality += $this->quality_level;
        }else{
            $this->item->quality = 50;
        }
    }

    public function update():void
    {
        $this->updateQuality();
        $this->updateSellIn();
    }

    protected function updateExpired():bool
    {
        if($this->item->sell_in > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public static function resolve(Item $item):bool
    {
        return ($item->name === "Backstage passes to a TAFKAL80ETC concert");
    }

    public static function getInstance(Item $item):self
    {
        return new BackstagePassUpdater($item);
    } 
}      