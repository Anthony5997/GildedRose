<?php

namespace App\Updaters;

use App\Item;
use App\Updaters\ItemUpdater;


class BackstagePassUpdater extends ItemUpdater
{

    private $quality_level;

    private function checkAndUpdateQualityLevel(){

        if($this->item->sell_in  <= 5){
            $this->quality_level = 3;
        }elseif($this->item->sell_in  <= 10){
            $this->quality_level = 2;
        }else{
            $this->quality_level = 1; 
        }
    }

    protected function decreaseQuality()
    {
      $this->item->quality = 0;
    }

    public function updateSellIn()
    {
        $this->item->sell_in -= 1;
    }

    public function updateQuality()
    {
        if($this->updateExpired()){
            $this->checkAndUpdateQualityLevel();
            $this->increaseQuality();
        }else{
            $this->decreaseQuality();
        }
    }

    protected function increaseQuality()
    {
        if($this->item->quality < 50 && ($this->item->quality + $this->quality_level) < 50){
            $this->item->quality += $this->quality_level;
        }else{
            $this->item->quality = 50;
        }
    }

    public function update()
    {
        $this->updateQuality();
        $this->updateSellIn();
    }

    protected function updateExpired()
    {
        if($this->item->sell_in > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public static function resolve(Item $item){
        return ($item->name === "Backstage passes to a TAFKAL80ETC concert");
    }

    public static function getMyInstance($item){
        return new BackstagePassUpdater($item);
    } 
}      