<?php

namespace App;

use App\Updaters\ItemUpdater;
use App\Item;

class UpdatersFactory
{
    protected $updater;
    protected $item;

    function __construct($updater, $item)
    {
        $this->updater = $updater;
        $this->item = $item;
    }
    
    public function create(){
        
        return new $this->updater($this->item);
    }
}