<?php

# ------------------ Page Route ------------------------
Route::get('/', 'CompanyController@getCompanyIntroduction')->name('home');

Route::get('company/about', 'CompanyController@getCompanyIntroduction');