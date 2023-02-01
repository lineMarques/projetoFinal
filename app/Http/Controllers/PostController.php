<?php

namespace App\Http\Controllers;

use App\Models\{
    Post,
    User,
    Image,
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $post;
    protected $user;
    protected $image;

    public function __construct(Post $post, User $user, Image $image)
    {
        $this->post = $post;
        $this->user = $user;
        $this->image = $image;
    }
    public function index()
    {
        $userPost = DB::table('posts')
            ->select('posts.id', 'title', 'subTitle', 'name', 'path', 'posts.created_at')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('images', 'images.post_id', '=', 'posts.id')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('noticias', compact('userPost'));
    }

    public function store(Request $request)
    {

        $user = $this->user->find(Auth::id());
        $user->posts()->create($request->all());

        if ($request->path) {

            $image = $this->image;
            $post = $this->post->latest('id')->first();

            $image->post_id = $post->id;
            $image->path = $request->path->storeAs('images', now() . '.' . $request->path->extension());

            $image->save();

        }


        return redirect('home')->with('msg', 'Sua notícia foi criada');

    }

    public function show($id)
    {
        $post = $this->post->findOrFail($id);
        $user = $this->user->where('id', $post->user_id)->first()->toArray();
        $image = $this->image->where('post_id', $post->id)->first();



        return view('show', compact('post', 'user', 'image'));
    }

    public function update()
    {

    }

    public function destroy()
    {
        $post = $this->post->user()->Auth::user();
        $post->delete();
        return redirect('/');

    }


}
