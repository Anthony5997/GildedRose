<?php

namespace App;

use App\Interfaces\ClassifiersInterface;
use App\Interfaces\FactoryInterface;
use App\UpdatersFactory;

class DirectorFactories
{
    public FactoryInterface $updater;
    public ClassifiersInterface $itemClassifier;

    function __construct(FactoryInterface $updater, ClassifiersInterface $itemClassifier)
    {
        $this->updater = $updater;
        $this->itemClassifier = $itemClassifier;
    }


}