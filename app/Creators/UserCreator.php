<?php namespace CompanyMainPage\Creators;

use app\Listeners\UserCreatorListener;
use CompanyMainPage\Models\User;
use Carbon\Carbon;

class UserCreator
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel  = $userModel;
    }

    public function create(UserCreatorListener $observer, $data)
    {
        $user = User::create($data);
        if (! $user) {
            return $observer->userValidationError($user->getErrors());
        }
        $user->cacheAvatar();
        return $observer->userCreated($user);
    }
}
