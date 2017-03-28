<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Applicant;
use App\Models\Post;
use App\Models\Category;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Auth;
use Input;
use Image;
use Validator;

use App\Http\Requests\StorePostRequest;

//use League\HTMLToMarkdown\HtmlConverter;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function create(Request $request)
    {
        $category = Category::find($request->input('category_id'));
        $categories = Category::all();
        return view('posts.create_edit', compact('categories', 'category'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->only('title', 'body_original', 'category_id', 'cover', 'excerpt');
        $data['user_id'] = Auth::id();

        $file = Input::file('cover_image');
        if ($file){
            $cover = $this->uploadImage($file);
            $data['cover'] = $cover;
        }
        $post = Post::create($data);
        return redirect(route('posts.show', $post->id));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $category = $post->category;

        return view('posts.create_edit', compact('post', 'categories', 'category'));
    }

    public function update($id, StorePostRequest $request)
    {
        $post = Post::findOrFail($id);
        $file = Input::file('cover_image');
        $data = $request->only('title', 'body_original', 'cover', 'category_id', 'excerpt');
        if ($file){
            $cover = $this->uploadImage($file);
            $data['cover'] = $cover;
            $post->update($data);
        }else{
            $cover = $data['cover'];
            if (strpos($cover, 'http') !== false && $cover!== $post->cover) {
                $post->update($data);
            }else{
                $post->update($request->only('title', 'body_original', 'category_id', 'excerpt'));
            }
        }

        return redirect(route('posts.show', $post->id));
    }

    public function index()
    {
        $posts = Post::recent()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->with('user', 'category')->first();
        $posts = Post::recent()->paginate(3);
        $post_applicants_counts = Applicant::where('post_id', $id)->count();

        return view('posts.show', compact('post', 'posts', 'post_applicants_counts'));
    }

    public function uploadCover()
    {
        $file = Input::file('cover_image');
        $input = array('cover_image' => $file);
        $rules = array('cover_image' => 'image');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $destinationPath = 'uploads/covers';
        $filename = time() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension() ?: 'png';
        $file->move($destinationPath, $filename);
        Image::make($destinationPath . $filename)->resize(1024, 546)->save();

        return Response::json(
            [
                'success' => true,
                'cover' => $destinationPath . $filename
            ]
        );
    }

    /*public function postsApplicantsList($user_id)
    {
        $posts = Post::where('user_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(20);

        return view('posts.posts_applicants_list',compact( 'posts'));
    }*/

    private function uploadImage($file)
    {
        $input = array('cover_image' => $file);
        $rules = array('cover_image' => 'image');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $destinationPath = 'uploads/covers/';
        //. '.' . $file->getClientOriginalExtension()
        $filename = time() .'_'. $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        Image::make($destinationPath . $filename)->resize(1024, 546)->save();
        return '/'.$destinationPath.'/'.$filename;
    }

}
