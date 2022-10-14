<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    private $perpage = 18;
    public function index()
    {
        return view('home', [
            'posts' => Post::paginate($this->perpage)
        ]);
    }

    public function search(Request $request)
    {
        if (!$request->get('keyword')) {
            return redirect()->route('home.index');
        }

        return view('search', [
            'posts' => Post::search($request->keyword)
                ->paginate($this->perpage)
                ->appends(['keyword => $request->keyword'])
        ]);
    }

    public function showCategories()
    {
        return view('frontend.categories', [
            'categories' => Category::onlyParent()->paginate($this->perpage)
        ]);
    }

    public function showPostDetail($slug)
    {
        $post = Post::with('categories')->where('slug', $slug)->first();
        if (!$post) {
            return redirect()->route('home.index');
        }

        return view('frontend.detail-post', [
            'post' => $post
        ]);
    }


    public function showPostByCategory($slug)
    {
        $posts = Post::whereHas('categories', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->paginate($this->perpage);

        $category = Category::where('slug', $slug)->first();

        return view('frontend.post-category', [
            'posts' => $posts,
            'category' => $category
        ]);
    }



    // {
    //     return view('home', [
    //         'posts' => post::paginate($this->perpage)
    //     ]);
    // }

    // public function search(Request $request)
    // {
    //     if (!$request->get('keyword')) {
    //         return redirect()->route('home.index');
    //     }

    //     return view('search', [
    //         'posts' => post::search($request->keyword)
    //             ->paginate($this->perpage)
    //             ->appends(['keyword => $request->keyword'])
    //     ]);
    // }

    // public function showpostDetail($slug)
    // {
    //     $post = post::where('slug', $slug)->first();
    //     if (!$post) {
    //         return redirect()->route('home.index');
    //     }

    //     return view('frontend.detail-post', [
    //         'post' => $post
    //     ]);
    // }
}
