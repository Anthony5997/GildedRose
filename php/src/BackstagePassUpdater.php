<?php

namespace App;

use App\ItemUpdater;


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
        $this->item->seel_in -= 1;
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
      $this->updateSellIn();
      $this->updateQuality();
    }

    protected function updateExpired()
    {
        if($this->item->sell_in < 0){
            return true;
        }else{
            return false;
        }
    }
}      