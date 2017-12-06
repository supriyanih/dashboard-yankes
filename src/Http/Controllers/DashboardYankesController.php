<?php namespace Supriyanih\DashboardYankes\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Supriyanih\DashboardYankes\Facades\DashboardYankes;
use Supriyanih\DashboardYankes\Models\DashboardYankesModel;

/**
 * The DashboardYankesController class.
 *
 * @package Supriyanih\DashboardYankes
 * @author  supriyanih <supriyanih@gmail.com>
 */
class DashboardYankesController extends Controller
{
    public function demo()
    {
        return DashboardYankes::welcome();
    }
}
