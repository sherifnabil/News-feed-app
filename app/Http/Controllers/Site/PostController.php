<?php

namespace App\Http\Controllers\Site;

use App\Post;
use App\Category;
use App\User;
use App\Tag;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Notifications\ApprovePost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    
    public function index(Request $request)
    {
        $posts = Post::when($request->search, function($q)  use($request){
             return $q->where('title', 'like', '%' . $request->search . '%');
        })->where('approve', 'active')->paginate(5);

        $title = 'Posts';
        return view('admin.posts.index', compact('posts', 'title'));
    }

  
    public function create()
    {
        $title = 'New Post';
        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('users', 'categories', 'title', 'tags'));
    }

   
    public function store( StorePost $request)
    {
        $data                   = $request->validated();
        $data['summary']        = str_limit(strip_tags($request->post_body, 50));
        $data[ 'slug']          = str_slug($request->title);
        $data['featured']       =  $request->hasFile('featured') ? featured($request->featured) : '';
        $data['other_images']   = $request->hasFile('other_images') ? other_images($request->other_images) : '';
        $post                   = Post::create($data);

        $post->tags()->attach($request->tag_id);
        session('success', __( 'site.created_successfully'));
        return redirect(route('dashboard.post.index'));
    }

    
    public function show(Post $post)
    {
        // if (!auth()->guard('admin') /*&& !$post->viewed_by()->pluck('user_id')*/) {
            // dd(($post->viewed_by[1]['id']));/*['id']);/*->attach(auth()->user()->id);*/
        // }
        // dd($post->viewed_by[]);
        // foreach ( $post->viewed_by as $viewer) {
        //     return dd($viewer);
        // }
        // in_array('')
        // $recent_posts = Post::latest()->take(6)->get();
        $viewers_count = $post->viewed_by()->count();
        $recent_posts  = Post::latest()->take(6)->get();
        return view('user.post.index', compact('post', 'recent_posts', 'viewers_count'));
    }

    
    public function edit(Post $post)
    {
        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        $title = 'Edit Post';
        return view('admin.posts.edit', compact('title', 'post', 'users', 'tags', 'categories'));
    }

    
    public function update(UpdatePost $request, Post $post)
    {
        $data = $request->validated();
        $data['summary']        = str_limit(strip_tags($request->post_body, 50));
        $data['slug']           = str_slug($request->title);
        $data['featured']       =  $request->hasFile('featured') ? update_featured($request->featured, $post) : '';
        $data['other_images']   = $request->hasFile('other_images') ? update_other_images($request->other_images, $post) : '';

        $post->tags()->sync($request->tag_id);
        $post->update($data);
        session('success', __( 'site.updated_successfully'));
        return redirect(route('dashboard.post.index'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        session('success', __('site.deleted_successfully'));
        return redirect(route('dashboard.post.index'));
    }
    
    public function trashed()
    {
        $title = 'Trashed Posts';
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed', compact('title', 'posts'));
    }
    public function restore($id)
    {
        // dd($post);
        $p = Post::withTrashed()->where('id', $id)->first();
        $p->restore();
        session()->flash('success', __('site.restored_successfully'));

        return redirect(route('dashboard.post.index'));
    }

    public function forcedelete($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        if(file_exists($post['featured'])):
             unlink($post['featured']);
        endif;
        if ($post['other_images_show']) {
            foreach ($post['other_images_show'] as $img) {
                if(file_exists( $img)):
                    unlink($img);
                endif;
            }
        }
        if($post){
            $post->forceDelete();
        }
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(route('dashboard.post.index'));
    }

    public function pending(Request $request)
    {
        $posts = Post::when($request->search, function($q)  use($request){
            return $q->where('title', 'like', '%' . $request->search . '%');
        })->where('approve','pending')->paginate(5);

        $title = 'Posts';

        return view('admin.posts.pending', compact('posts', 'title'));
    }

    public function activate($id)
    {
        $post = Post::where('id', $id)->first();
        $post->approve = 'active';
        $post->save();
        $user = User::where('id', $post->user_id)->first();
        if($user->subscription['notification_type'] == 'email_notification' || $user->subscription['notification_type'] == 'both' ):
            $user->notify(new ApprovePost($post, $user));
        endif;
        session()->flash('success', __('site.activated_successfully'));
        return redirect(route('dashboard.post.pending'));

    }
    
    public function refuse($id)
    {
        $post = Post::where('id', $id)->first();
        $post->approve = 'refused';
        $post->save();
        session()->flash('success', __('site.refused_successfully'));

        return redirect(route('dashboard.post.refuse'));
    }
    public function refused_posts(Request $request)
    {
       $posts = Post::when($request->search, function($q)  use($request){
            return $q->where('title', 'like', '%' . $request->search . '%');
        })->where('approve', 'refused')->paginate(5);

        $title = 'Refused Posts';

        return view('admin.posts.refused', compact('posts', 'title'));
    }
}
