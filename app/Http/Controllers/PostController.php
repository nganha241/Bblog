<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    private $post;
    private $category;
    private $tag;

    public function __construct(Category $category, Post $post, Tag $tag)
    {
        $this->category = $category;
        $this->post = $post;
        $this->tag = $tag;
    }
    public function index()
    {
        $posts = $this->post->latest()->paginate(10);
        return view('post.index',compact('posts'));
    }

    public function create()
    {
        $categories = $this->category->all();
        $tags = $this->tag->all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $tag = $request->input('tags', []);
        $image = $request->file('avatar');
        $this->post->create([
            'title' => $request->title,
            'content' => $request->content,
            'avatar' => $request->file('avatar')->move('images', $image->getClientOriginalName()),
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
        ])->tags()->attach($tag, ['created_at'=>date('Y-m-d  H:i:s')]);
        return redirect('admin/posts');
    }

    public function edit($id)
    {
        $categories = $this->category->all();
        $tags = $this->tag->all();
        $post = $this->post->find($id);
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update($id, Request $request)
    {
        $tag = $request->input('tags', []);
        $post = $this->post->find($id);
        if($request->hasFile('avatar'))
        {
            $path = 'images/'. $post->avatar;
            if(File::exists('avatar'))
            {
                File::delete($path);
            }
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $post->avatar = $request->file('avatar')->move('images', $filename);
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->status = $request->input('status');
        $post->slug = Str::slug($request->input('title'));
        $post->update();
        $post->tags()->sync($tag);

        return redirect('admin/posts');
    }

    public function destroy($id)
    {
        if(Gate::denies('posts.destroy'))
        {
            return view('404');
        }
        $this->post->find($id)->delete();
        return redirect('admin/posts');
    }

    
}
