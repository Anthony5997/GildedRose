<?php

namespace App;

use App\Interfaces\FactoryInterface;
use App\Interfaces\UpdatersInterface;

class UpdatersFactory implements FactoryInterface
{    
    public function create($updater,Item $item):UpdatersInterface
    {
        return new $updater($item);
    }
}