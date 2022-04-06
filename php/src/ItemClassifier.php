<?php

namespace App;
use App\UpdatersFactory;
use App\Updaters\AgedBrieUpdater;
use App\Updaters\BackstagePassUpdater;
use App\Updaters\ConjuredItemUpdater;
use App\Updaters\SulfurasUpdater;
use App\Updaters\ItemUpdater;
use App\Item;

//This classed is a some sort of factory used to create a new Updater based on item name
class ItemClassifier
{
   public function getInstance($item){
      $updaters = $this->getNameSpace();

      
      foreach ($updaters as $updater) {
      
         if($updater::resolve($item)){
     
            return new UpdatersFactory($updater, $item);
         }
      }
   }

   public function getNameSpace(){

   $fileList = glob('src/Updaters/*.php');
   $classListArray = [];
   foreach($fileList as $filename){
      if(is_file($filename)){
         $class = explode('/', $filename);
         $class2 = explode('.', $class[2]);
         $classList = $class2[0];
         array_push($classListArray, "\\App\\Updaters\\".$classList);
      }   
   }
   return $classListArray;
   }
   
   public function categorize($item)
   {
      $instance = $this->getInstance($item);
      return $instance->create();
   }
}

