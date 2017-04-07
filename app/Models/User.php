<?php

namespace CompanyMainPage\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;
use Carbon\Carbon;
use Cache;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use CompanyMainPage\Models\Traits\UserRememberTokenHelper;
use CompanyMainPage\Models\Traits\UserSocialiteHelper;
use CompanyMainPage\Models\Traits\UserAvatarHelper;
use CompanyMainPage\Jobs\SendActivateMail;

class User extends BaseModel implements AuthenticatableContract,
    AuthorizableContract
{
    use UserRememberTokenHelper, UserSocialiteHelper, UserAvatarHelper;
    use PresentableTrait;
    public $presenter = 'CompanyMainPage\Presenters\UserPresenter';

    use \Venturecraft\Revisionable\RevisionableTrait;
    protected $keepRevisionOf = [
        'is_banned'
    ];

    use EntrustUserTrait {
        restore as private restoreEntrust;
        EntrustUserTrait::can as may;
    }
    use SoftDeletes {
        restore as private restoreSoftDelete;
    }

    protected $table = 'users';
    protected $guarded = ['id', 'is_banned'];
    protected $dates = ['deleted_at'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function restore()
    {
        $this->restoreEntrust();
        $this->restoreSoftDelete();
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $driver = $user['github_id'] ? 'github' : 'wechat';
            SiteStatus::newUser($driver);

            dispatch(new SendActivateMail($user));
        });
    }

    /**
     * ----------------------------------------
     * UserInterface
     * ----------------------------------------
     */

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function recordLastActivedAt()
    {
        $now = Carbon::now()->toDateTimeString();

        $update_key = config('custom.actived_time_for_update');
        $update_data = Cache::get($update_key);
        $update_data[$this->id] = $now;
        Cache::forever($update_key, $update_data);

        $show_key = config('custom.actived_time_data');
        $show_data = Cache::get($show_key);
        $show_data[$this->id] = $now;
        Cache::forever($show_key, $show_data);
    }

    public function getUpdatedAttribute($date)
    {
        return $this->formatDate($date);
    }

    public function getCreatedAtAttribute($date)
    {
        return $this->formatDate($date);
    }

    public function getLastActivedAtAttribute($date)
    {
        return $this->formatDate($date);
    }

    private function formatDate($date)
    {
        if (Carbon::now() < Carbon::parse($date)->addDays(10)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }
}
