<?php

namespace App;

use App\Interfaces\UpdatersInterface;


class UpdatersFactory
{
    // protected $updater;
    // protected $item;

    // function __construct()
    // {
        // $this->updater = $updater;
        // $this->item = $item;
    // }
    
    public function create($updater, $item):UpdatersInterface
    {
        return $updater::getInstance($item);
    }
}