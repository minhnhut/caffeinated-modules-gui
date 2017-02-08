<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/caffeinated-modules', 'MinhNhut\CaffeinatedModulesGui\Controllers\ModulesGuiController@list')->name('minhnhut.caffeinatedModulesGui.list');
    Route::get('/caffeinated-modules/activate/{slug}', 'MinhNhut\CaffeinatedModulesGui\Controllers\ModulesGuiController@activate')->name('minhnhut.caffeinatedModulesGui.activate');
    Route::get('/caffeinated-modules/deactivate/{slug}', 'MinhNhut\CaffeinatedModulesGui\Controllers\ModulesGuiController@deactivate')->name('minhnhut.caffeinatedModulesGui.deactivate');
});