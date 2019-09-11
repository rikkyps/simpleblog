<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Comment;
use App\Post;
use App\Category;

class IndexController extends Controller
{
    public function getSetting()
    {
        return Setting::first();
    }

    public function index()
    {
        $setting = $this->getSetting();
        $posts = Post::where('status', 1)->orderBy('published_at', 'DESC')->limit(3)->get();

        return view('welcome', compact('setting', 'posts'));
    }

    public function blog()
    {
        $setting = $this->getSetting();
        $posts = Post::where('status', 1)->orderBy('published_at', 'DESC')->paginate(4);

        return view('blog', compact('setting', 'posts'));
    }

    public function show($slug)
    {
        $setting = $this->getSetting();
        $post = Post::where('slug', $slug)->first();

        $prev = Post::where('id', '<', $post->id)
                ->latest('id')
                ->first();

        $next = Post::where('id', '>', $post->id)
                ->first();

        return view('show', compact('setting', 'post', 'prev', 'next'));
    }

    public function comment(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'body' => 'required|min:4',
        ]);

        $post = Post::where('slug', $request->slug)->first();

        $request['post_id'] = $post->id;
        $request['status'] = 0;
        Comment::create($request->all());

        return redirect()->back();
    }

    public function blogSearch(Request $request)
    {
        $setting = $this->getSetting();
        $posts = Post::search($request->get('q'))->where('status', 1)->orderBy('published_at', 'DESC')->paginate(4);
        return view('blog', compact('posts', 'setting'));
    }

    public function blogCategory($slug)
    {
        $setting = $this->getSetting();
        $category = Category::where('slug', $slug)->first();
        $posts = $category->post()->where('status', 1)->orderBy('published_at', 'DESC')->paginate(4);

        return view('blog', compact('setting', 'posts'));
    }
}
