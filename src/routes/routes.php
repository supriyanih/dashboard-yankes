<?php

Route::group(['prefix' => 'dashboard-yankes'], function() {
    Route::get('demo', 'Supriyanih\DashboardYankes\Http\Controllers\DashboardYankesController@demo');
});
