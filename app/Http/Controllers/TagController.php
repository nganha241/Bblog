<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    private $tag = '';

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
       $tags = $this->tag->latest()->paginate(10);
        return view('tag.index', compact('tags'));
    }

    public function create(Request $request)
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $this->tag->create([
            'name' => $request->name,
        ]);

        return redirect('admin/tags');
    }

    public function edit($id)
    {
        $tag = $this->tag->find($id);
        return view('tag.edit', compact('tag'));
    }

    public function update($id, Request $request)
    {
        $this->tag->find($id)->update([
            'name' =>$request->name,
        ]);
        return redirect('admin/tags');
    }

    public function destroy($id)
    {
        if(Gate::denies('tags.destroy'))
        {
            return view('404');
        }

        
        $this->tag->find($id)->delete();
        return redirect('admin/tags');
    }
}
