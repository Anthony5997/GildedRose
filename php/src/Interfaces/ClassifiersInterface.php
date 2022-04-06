<?php

namespace App\Interfaces;
use App\Item;

interface ClassifiersInterface
{
   public function getNameSpace():array;
   public function categorize(Item $item):string;
}
