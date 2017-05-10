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
        return view('company.company_home_page');
    }

    public function getCompanyBusinessContent(){
        return view('company.company_business_content');
    }

    public function getCompanyContactUs(){
        return view('company.company_contact_us');
    }

    public function getCompanyClubSummary(){
        return view('company.company_club_summary');
    }

    public function getCompanyActivityInfo(){
        return view('company.company_activity_info');
    }

}