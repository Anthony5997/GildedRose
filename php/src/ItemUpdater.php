<?php

namespace App;

class ItemUpdater
{

    protected $item;

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
      if($this->item->sell_in >= 0 ){
        $this->item->quality -= 1;
        $this->checkQuality();
      }else{
        $this->item->quality -= 2;
        $this->checkQuality();
      }
    }

    public function updateSellIn()
    {
      $this->item->sell_in -=1;
    }

    public function updateQuality()
    {
      $this->decreaseQuality();
    }

    protected function increaseQuality()
    {
      if($this->updateExpired()){
        $this->item->quality += 1;
      }else{
        $this->item->quality = 0;
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

}

