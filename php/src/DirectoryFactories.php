<?php

namespace App;

use App\UpdatersFactory;

class DirectoryFactories
{
    public UpdatersFactory $updater;
    public ItemClassifier $itemClassifier;

    function __construct()
    {
        $this->updater = new UpdatersFactory();
        $this->itemClassifier =  new ItemClassifier();
    }


}