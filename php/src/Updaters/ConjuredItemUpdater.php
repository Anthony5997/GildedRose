<?php

namespace App\Updaters;

use App\Item;
use App\Updaters\ItemUpdater;


class ConjuredItemUpdater extends ItemUpdater
{
    function __construct($item)
    {
        $this->item = $item;
    }

    public function __toString()
    {
        return "{$this->item}";
    }

    protected function decreaseQuality()
    {
      if($this->updateExpired()){
        $this->item->quality -= 1;
        $this->checkQuality();
      }else{
        $this->item->quality -= 2;
        $this->checkQuality();
      }
    }

    public function updateSellIn()
    {
      $this->item->sell_in -= 1;
    }

    public function updateQuality()
    {
      $this->decreaseQuality();
    }

    protected function increaseQuality()
    {
        if($this->item->quality < 50){
            $this->item->quality += 1;
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
        return false;
      }else{
        return true;
      }
    }

    protected function checkQuality(){
      if($this->item->quality <= 0){
        $this->item->quality = 0;
      }
    }

    public static function resolve(Item $item){
      return ($item->name === "Conjured Mana Cake");
    }
  
    public static function getMyInstance($item){
      return new ConjuredItemUpdater($item);
    } 

}