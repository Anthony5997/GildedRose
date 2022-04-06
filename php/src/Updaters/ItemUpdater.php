<?php

namespace App\Updaters;

use App\Item;
use App\Interfaces\UpdatersInterface;

class ItemUpdater implements UpdatersInterface
{

    protected $item;

    function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function __toString():string
    {
        return "{$this->item}";
    }

    protected function decreaseQuality():void
    {
      if($this->item->sell_in >= 0 ){
        $this->item->quality -= 1;
        $this->checkQuality();
      }else{
        $this->item->quality -= 2;
        $this->checkQuality();
      }
    }

    public function updateSellIn():void
    {
      $this->item->sell_in -=1;
    }

    public function updateQuality():void
    {
      $this->decreaseQuality();
    }

    protected function increaseQuality():void
    {
      if($this->updateExpired()){
        $this->item->quality += 1;
      }else{
        $this->item->quality = 0;
      }
    }

    public function update():void
    {
      $this->updateSellIn();
      $this->updateQuality();
    }

    protected function updateExpired():bool
    {
      if($this->item->sell_in < 0){
          return false;
        }else{
          return true;
        }
  }

    protected function checkQuality():void
    {
      if($this->item->quality <= 0){
        $this->item->quality = 0;
      }
    }

  public static function resolve(Item $item):bool
  {
    return (in_array($item->name, ["Elixir of the Mongoose", "+5 Dexterity Vest", "foo"]));
  }

  public static function getInstance(Item $item):self
  {
    return new ItemUpdater($item);
  } 

}

