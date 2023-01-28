<?php

namespace App\Http\Controllers;

use App\Models\{
    Post,
    User
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $post;
    protected $user;

    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }
    public function index()
    {


        $userPost = DB::table('posts')
            ->select('posts.id', 'title', 'subTitle', 'name', 'image', 'posts.created_at')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('noticias', compact('userPost'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $user = $this->user->find(Auth::id());

        $user->posts()->create($request->all());

        return redirect('home')->with('msg', 'Sua notícia foi criada');

    }

    public function show($id)
    {
        $post = $this->post->findOrFail($id);
        return view('show', compact('post'));
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
