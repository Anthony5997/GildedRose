<?php

namespace App;

use App\ItemUpdater;

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
            $this->item->quality += 1;
        }else{
            echo 'Qualitée maximum atteinte';
        }
    }

    public function update()
    {
      $this->updateSellIn();
      $this->updateQuality();
    }

    protected function updateExpired()
    {
      /*TODO*/
    }
}