<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $title = 'Categories';

        $categories = Category::when($request->search, function( $q) use ($request){ 
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        return view('admin.categories.index', compact('categories', 'title'));    }

   
    public function create()
    {
        $title = 'Add Category';
        return view('admin.categories.create', compact('title'));
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  =>  'required'
        ]);
        Category::create($data);
        session()->flash('success', __('site.created_successfully'));
        return redirect(route('dashboard.category.index'));

    }

    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        return view('user.category.index', compact('category', 'posts' ));
    }

    
    public function edit(Category $category)
    {
        $title = 'Edit Category';
        return view('admin.categories.edit', compact('title', 'category'));
        
    }

   
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'  =>  'required'
        ]);
        Category::where('id', $category->id)->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('dashboard.category.index'));
    }

  
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(route('dashboard.category.index'));
    }
}
