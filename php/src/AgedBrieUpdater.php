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

    protected function decreaseQuality()
    {
      /*TODO*/
    }

    public function updateSellIn()
    {
      /*TODO*/
    }

    public function updateQuality()
    {
      /*TODO*/
    }

    protected function increaseQuality()
    {
      /*TODO*/
    }

    public function update()
    {
      /*TODO*/
    }

    protected function updateExpired()
    {
      /*TODO*/
    }
}