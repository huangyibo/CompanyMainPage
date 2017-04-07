<?php

namespace CompanyMainPage\Handlers;

use CompanyMainPage\Models\User;
use Illuminate\Mail\Message;
use Mail;
use Naux\Mail\SendCloudTemplate;
use Jrean\UserVerification\Facades\UserVerification;

class EmailHandler
{
    public function sendActivateMail(User $user)
    {
        UserVerification::generate($user);
        $token = $user->verification_token;
        Mail::send('emails.fake', [], function (Message $message) use ($user, $token) {
            $message->subject('请验证您的邮箱');

            $message->getSwiftMessage()->setBody(new SendCloudTemplate('template_active', [
                'name' => $user->name,
                'url'  => url('verification', $user->verification_token).'?email='.urlencode($user->email),
            ]));
            $message->to($user->email);
        });
    }
}
