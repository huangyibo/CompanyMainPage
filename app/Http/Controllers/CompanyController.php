<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 2017/4/6
 * Time: 14:33
 */

namespace CompanyMainPage\Http\Controllers;

use CompanyMainPage\Models\ContactInfo;
use CompanyMainPage\Http\Requests\StoreContactInfoRequest;


class CompanyController extends Controller
{
    public function __construct()
    {

    }

    public function getCompanyIntroduction()
    {
        return view('company.company_home_page');
    }

    public function getCompanyBusinessContent()
    {
        return view('company.company_business_content');
    }

    public function getCompanyContactUs()
    {
        return view('company.company_contact_us');
    }

    public function getCompanyClubSummary()
    {
        return view('company.company_club_summary');
    }

    public function getCompanyActivityInfo()
    {
        return view('company.company_activity_info');
    }

    public function store(StoreContactInfoRequest $request)
    {
        $data = $request->only('company_name','name','email','phone','contact_type','contact_content');
        ContactInfo::create($data);

        // Set JSON Response array (status = success | error)
        $response = array('status' => 'ok', 'msg' => 'Submit Successfully!');
        return response ()->json($response);
    }

}