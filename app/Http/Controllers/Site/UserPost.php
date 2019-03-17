<?php

namespace App\Http\Controllers\Site;

use App\Post;
use App\Category;
use App\User;
use App\Tag;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPost extends Controller
{
   
    public function index()
    {
        //
    }

  
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $recent_posts = Post::latest()->take(6)->get();

        return view('user.post.create', compact('categories', 'recent_posts', 'tags'));
    }

   
    public function store( StoreUserPost $request)
    {
        $data                   = $request->validated();
        $data['summary']        = str_limit(strip_tags($request->post_body, 50));
        $data[ 'slug']          = str_slug($request->title);
        $data[ 'user_id']       = auth()->user()->id;
        $data['featured']       = $request->hasFile('featured') ? featured($request->featured) : '';
        $data['other_images']   = $request->hasFile('other_images') ? other_images($request->other_images) : '';

        $post = Post::create($data);
        $post->tags()->attach($request->tag_id);
        session('success', __( 'site.created_successfully'));
        return redirect(route('home'));
    }

    
    public function show(Post $post)
    {
        if (!auth()->guard('admin') ) {
        //     // foreach ($post->viewed_by as $user) {
        //         // if (!$user->id == auth()->id()) {
                    
            $post->viewed_by()->attach(auth()->id());
        //         // }
        //     // }
        }
        $viewers_count = $post->viewed_by()->count();
            // dd($viewers_count);
            // foreach ($viewers_count as $value) {
            //     return $value;
            // }
        $recent_posts = Post::latest()->take(6)->get();
        return view('user.post.index', compact('post', 'recent_posts', 'viewers_count'));
    }

   
    public function edit( Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $recent_posts = Post::latest()->take(6)->get();

        return view('user.post.edit', compact('categories', 'post', 'recent_posts', 'tags'));
    }

    
    public function update(UpdateUserPost $request, Post $post)
    {
        $data = $request->validated();
        $data['summary']        = str_limit(strip_tags($request->post_body, 50));
        $data['slug']           = str_slug($request->title);
        $data['featured']       =  $request->hasFile('featured') ? update_featured($request->featured, $post) : '';
        $data['other_images']   = $request->hasFile('other_images') ? update_other_images($request->other_images, $post) : '';
        array_forget($data, 'tag_id');
        $post->tags()->sync($request->tag_id);
        $post->update($data);
        session('success', __('site.updated_successfully'));
        return redirect(route('dashboard.post.index'));
    }

    public function destroy(Post $post)
    {
         $post = Post::onlyTrashed()->where('id', $post->id)->first();
        if(file_exists($post->featured)):
             unlink($post->featured);
        endif;
        foreach ($post->other_images_show as $img) {
            if(file_exists( $img)):
                 unlink($img);
            endif;
        }
        $post->forceDelete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(route('dashboard.post.index'));
    }
}
