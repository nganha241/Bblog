<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::all();
        $posts = Post::inRandomOrder()->limit(8) ->get();
        return view('blog.home', compact( 'posts', 'categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $keyword = $request->input('keyword');
        
        if($keyword) {
            $posts = Post::where('title', 'like', "%{$keyword}%")->paginate(3);
        }
        return view('blog.search', compact('categories', 'posts'));
    }

    public function category($slug)
    {
        $categories = Category::all();
        $categories_posts = Category::where('slug', $slug)->pluck('id');
        $posts = Post::where('category_id', $categories_posts)->latest()->paginate(10);
        return view('blog.category', compact('categories', 'posts'));
    }

    public function detail($slug)
    {
        $categories = Category::all();
        $post = Post::where('slug', $slug)->first(); // nếu dùng get() sẽ cho ra nhiều đối tượng
        $category_id = Post::where('slug', $slug)->pluck('category_id');
        $related_posts = Post::where('category_id', $category_id)
                                        ->where('slug', '<>', $slug)->limit(4)->latest()->paginate(10);
        return view('blog.post.detail', compact('post', 'categories', 'related_posts'));
    }
}
