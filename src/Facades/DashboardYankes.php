<?php namespace Supriyanih\DashboardYankes\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The DashboardYankes facade.
 *
 * @package Supriyanih\DashboardYankes
 * @author  supriyanih <supriyanih@gmail.com>
 */
class DashboardYankes extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dashboard-yankes';
    }
}
