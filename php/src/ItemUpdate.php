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

