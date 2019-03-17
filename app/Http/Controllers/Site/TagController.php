<?php

namespace App\Http\Controllers\Site;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function index(Request $request)
    {
        $title = 'Tags';

        $tags = Tag::when($request->search, function( $q) use ($request){ 
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        return view('admin.tags.index', compact('tags', 'title'));
    }


    public function create()
    {
        $title = 'Add Tag';
        return view('admin.tags.create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  =>  'required'
        ]);

        Tag::create($data);

        session()->flash('success', __('site.created_successfully'));
        return redirect(route('dashboard.tag.index'));
    }

    public function show(Tag $tag)
    {
        $posts = $tag->posts()->where('approve', 'active')->get();
        
        return view('user.tag.index', compact('tag', 'posts' ));
    }


    public function edit(Tag $tag)
    {
        $title = 'Edit Tag';
        return view('admin.tags.edit', compact('title', 'tag'));
    }


    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name'  =>  'required'
        ]);
        $tag->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('dashboard.tag.index'));
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();
    }
}
