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
use Mail;


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
        $email = get_contact_us_email();
        $contactInfo = $this->parseContactInfo($data);
        $flag = Mail::send('emails.contact_us_success',
            ['contactInfo' => $contactInfo],
            function ($message) use ($contactInfo, $email) {
                $to = $email;
                $message->to($to)->subject('[株式会社 YAKUMO官网]'.$contactInfo->name.'向您发起公司业务咨询！');
            });

        // Set JSON Response array (status = success | error)
        $response = array('status' => 'ok', 'msg' => 'Submit Successfully!');
        return response ()->json($response);
    }

    public function parseContactInfo($data){
        if (isset($data)){
            $contactInfo = new ContactInfo();
            $contactInfo->name = isset($data['name']) ? $data['name']:null;
            $contactInfo->email = isset($data['email']) ? $data['email']:null;
            $contactInfo->phone = isset($data['phone']) ? $data['phone'] : null;
            $contactInfo->contact_type = isset($data['contact_type']) ? $data['contact_type']:null;
            $contactInfo->contact_content = isset($data['contact_content']) ? $data['contact_content']: null;
            $contactInfo->company_name = isset($data['company_name']) ? $data['company_name']:null;
            return $contactInfo;
        }
        return null;
    }

}