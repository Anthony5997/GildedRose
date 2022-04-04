<?php

namespace App;

use App\ItemUpdater;

class SulfurasUpdater extends ItemUpdater
{
	function __construct($item)
    {
        $this->item = $item;
    }

    public function __toString()
    {
        return "{$this->item}";
    }

     public function update()
    {
      $this->item->quality = 80;
    }

}
