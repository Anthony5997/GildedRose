<?php

namespace App\Interfaces;
use App\Item;
use App\Interfaces\UpdatersInterface;

interface FactoryInterface
{
    public function create(string $updater, Item $item):UpdatersInterface;
}
