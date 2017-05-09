<?php

# ------------------ Page Route ------------------------
Route::get('/', 'CompanyController@getCompanyIntroduction')->name('home');
Route::get('company/business-content', 'CompanyController@getCompanyBusinessContent');
Route::get('company/contact-us', 'CompanyController@getCompanyContactUs');
Route::get('company/club-summary', 'CompanyController@getCompanyClubSummary');
Route::get('company/about', 'CompanyController@getCompanyIntroduction');