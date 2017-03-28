<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Cache;
use Auth;
use Flash;
use App\Http\Requests\UpdateUserRequest;
use App\Jobs\SendActivateMail;
use App\Http\Requests\StoreUserRequest;

class UsersEditController extends Controller
{
    public function __construct()
    {

    }

    public function edit_avatar($id){

        return view('users.edit_avatar');
    }

    public function edit_email_notify($id){

        return view('users.edit_email_notify');
    }

    public function edit_social_binding($id){
        return view('users.edit_social_binding');
    }

}
