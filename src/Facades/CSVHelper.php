<?php

namespace narwanimonish\CSVHelper\Facades;

use Illuminate\Support\Facades\Facade;

class CSVHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'csvhelper';
    }
}
