<?php
namespace App;
use App\AgedBrieUpdater;
use App\BackstagePassUpdater;
use App\ConjuredItemUpdater;
use App\SulfurasUpdater;
use App\ItemUpdater;
use App\Item;




// function classes_in_namespace($namespace) {
//     $namespace .= '\\';
//     var_dump($namespace);
//     $myClasses  = array_filter(get_declared_classes(), function($item) use ($namespace) { return substr($item, 0, strlen($namespace)) === $namespace; });
//     var_dump(get_declared_classes());
//     $theClasses = [];
//     foreach ($myClasses AS $class):
//           $theParts = explode('\\', $class);
//           $theClasses[] = end($theParts);
//         endforeach;
//     return $theClasses;
//  }
        
//     $MyClasses = classes_in_namespace("App");
    
//     echo "<pre>" . var_dump($MyClasses) . "</pre>";