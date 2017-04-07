<?php

namespace CompanyMainPage\Listeners;

interface UserCreatorListener
{
    public function userValidationError($errors);
    public function userCreated($user);
}
