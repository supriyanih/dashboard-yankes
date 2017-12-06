<?php namespace Supriyanih\DashboardYankes\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The DashboardYankesModel class.
 *
 * @package Supriyanih\DashboardYankes
 * @author  supriyanih <supriyanih@gmail.com>
 */
class DashboardYankesModel extends Model
{
    /**
    * Table name.
    *
    * @var string
    */
    protected $table = 'dashboard_yankes';

    /**
    * The attributes that are mass assignable.
    *
    * @var mixed
    */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
