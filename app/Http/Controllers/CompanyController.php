<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 2017/4/6
 * Time: 14:33
 */

namespace CompanyMainPage\Http\Controllers;


class CompanyController extends Controller
{
    public function __construct(){

    }

    public function getCompanyIntroduction(){
        return view('company.componay_introduction');
    }
}