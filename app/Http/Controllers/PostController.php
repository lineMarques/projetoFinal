<?php

namespace App\Http\Controllers;

use App\Models\{
    Post,
    User
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $post = $this->post->all();
        return view('noticias');
    }

    public function create()
    {
        return view('dashboard');

    }

    public function store(Request $request)
    {
        $user = $this->user->find(Auth::id());
        $post = $this->post->create($request->all());

    }

    public function show()
    {


    }

    public function update()
    {

    }

    public function destroy()
    {

    }


}
