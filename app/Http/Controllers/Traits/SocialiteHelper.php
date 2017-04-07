<?php namespace CompanyMainPage\Http\Controllers\Traits;

use Auth;
use Socialite;
use Illuminate\Http\Request;
use CompanyMainPage\Models\User;
use Flash;

trait SocialiteHelper
{
    protected $oauthDrivers = [
        'github' => 'github',
        'wechat' => 'weixin',
        'weibo'  => 'weibo'
    ];

    public function oauth(Request $request)
    {
        $driver = $request->input('driver');
        $driver = !isset($this->oauthDrivers[$driver])
                    ? 'github'
                    : $this->oauthDrivers[$driver];

        if (Auth::check() && Auth::user()->register_source == $driver) {
            return redirect('/');
        }

        return Socialite::driver($driver)->redirect();
    }

    public function callback(Request $request)
    {
        $driver = $request->input('driver');

        if (
            !isset($this->oauthDrivers[$driver])
            || (Auth::check() && Auth::user()->register_source == $driver)
        ) {
            return redirect()->intended('/');
        }

        $oauthUser = Socialite::with($this->oauthDrivers[$driver])->user();
        $user = User::getByDriver($driver, $oauthUser->id);

        $driverHint = $driver=='github' ? 'GitHub' : '微信';
        if (Auth::check()) {
            if ($user && $user->id != Auth::id()) {
                Flash::error('抱歉，您的 ' . $driverHint . ' 账号已被其他账号绑定，请更换账号重新尝试');
            } else {
                $this->bindSocialiteUser($oauthUser, $driver);
                Flash::success('恭喜，您的 ' . $driverHint . ' 账号绑定成功');
            }

            return redirect(route('users.edit_social_binding', Auth::id()));
        } else {
            if ($user) {
                return $this->loginUser($user);
            }

            return $this->userNotFound($driver, $oauthUser);
        }
    }

    public function bindSocialiteUser($oauthUser, $driver)
    {
        $currentUser = Auth::user();

        if ($driver == 'github') {
            $currentUser->github_id = $oauthUser->id;
        } elseif ($driver == 'wechat') {
            $currentUser->wechat_openid = $oauthUser->id;
            $currentUser->wechat_unionid = $oauthUser->user['unionid'];
        }

        $currentUser->save();
    }
}
