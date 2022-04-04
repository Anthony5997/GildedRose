<?php

namespace App;
use App\AgedBrieUpdater;
use App\BackstagePassUpdater;
use App\ConjuredItemUpdater;
use App\SulfurasUpdater;
use App\ItemUpdater;

//This classed is a some sort of factory used to create a new Updater based on item name
class ItemClassifier
{

	/*TODO*/

    public function categorize($item)
    {
       switch ($item->name) {
          case 'Aged Brie':
             return new AgedBrieUpdater($item);
             break;
         case 'Sulfuras, Hand of Ragnaros':
            return new SulfurasUpdater($item);
            break;
         case 'Backstage passes to a TAFKAL80ETC concert':
            return new BackstagePassUpdater($item);
            break;
         case 'Conjured Mana Cake':
            return new ConjuredItemUpdater($item);
            break;             
          default:
            return new ItemUpdater($item);
             break;
       }
    }

    public function update()
    {
       $this->item->update();
    }
}
