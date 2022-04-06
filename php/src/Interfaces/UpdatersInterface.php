<?php 
namespace App\Interfaces;

use App\Item;

 interface UpdatersInterface{

    public static function resolve(Item $item);
    public static function getInstance(Item $item); 
}