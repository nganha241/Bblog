<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $categories = $this->category->latest()->paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect('admin/categories');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('category.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        if(Gate::denies('categories.destroy'))
        {
            return view('404');
        }

        $posts = Post::all();
        foreach($posts as $post)
        {
            if($id == $post->category_id)
            {
                return redirect('admin/categories');
            }
        }
        $this->category->find($id)->delete();
        return redirect('admin/categories');
    }
}
