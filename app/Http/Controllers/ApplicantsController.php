<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 2017/3/24
 * Time: 23:52
 */

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Applicant;
use Auth;
use Validator;

use App\Http\Requests\StoreApplicantRequest;
class ApplicantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }

    public function store(StoreApplicantRequest $request)
    {
        $data = $request->only('post_id','name','email','phone', 'company_name', 'position', 'message_text');
        /*$validator = Validator::make($request->all(), []);

        // 验证邮箱是否已报名该post_id活动
        $email = $data['email'];
        $applicant = Applicant::where('post_id', $data['post_id'])->where('email', $email)->first();
        if ($applicant){
            $validator->errors()->add('email', 'Email邮箱已报名该活动！');
            return $validator->errors()->all();
        }

        // 验证phone手机号是否已报名该post_id活动
        $applicant = Applicant::where('post_id', $data['post_id'])->where('phone', $data['phone'])->first();
        if ($applicant){
            $validator->errors()->add('phone', '您的手机号已报名该活动！');
            return $validator->errors()->all();
        }*/

        $applicant = Applicant::create($data);
        $post = Post::where('id', $data['post_id'])->first();
        $apply_num = $post->apply_num + 1;
        $post->update(['apply_num' => $apply_num]);

        return redirect(route('posts.show', $data['post_id']));
    }

    public function listByPostId($post_id)
    {
        $user = Auth::user();
        $post = Post::where('id', $post_id)->with('user', 'category')->first();
        $applicants = Applicant::where('post_id', $post_id)
            ->orderBy('created_at', 'ASC')
            ->simplePaginate(20);

        return view('users.user_center', compact('applicants', 'post', 'user'));
    }

}