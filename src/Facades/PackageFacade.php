<?php

namespace Vendor\Package\Facades;

use Illuminate\Support\Facades\Facade;

class PackageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'package'; // TODO: Change the accessor name
    }
}
