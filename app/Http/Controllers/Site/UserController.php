<?php

namespace App\Http\Controllers\Site;

use App\User;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    
    public function index(Request $request)
    {
        $users = User::when($request->search, function($q)  use($request){
             return $q->where('first_name', 'like', '%' . $request->search . '%')->orWhere('last_name', 'like', '%' . $request->search . '%')->whereNull( 'email_verified_at');
        })->paginate(5);
        $title = 'Users Panel';
        return view('admin.users.index', compact(['title', 'users']));
    }

  
    
    public function create()
    {
        $title = 'Add User';
        $subscription = Subscription::all();
        return view('admin.users.create', compact('title', 'subscription'));
        
    }

 
    
    public function store(Request $request)
    {
        $request->validate([
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6',
            'featured'          => 'required|image',
            'subscription_id'   => 'required,numeric',
        ]);

        $data = request()->except(['password', 'featured']);

        $data['password'] = bcrypt($request->password);

        if($request->hasFile('featured')):
            $file_new_name = 'uploads/users_profile/' . $request->featured->hashName();
            $request->featured->move( 'uploads/users_profile', $file_new_name);
            $data['featured'] =$file_new_name;
        endif;
        User::create($data);
        session()->flash('success', __('site.created_successfully'));
        return redirect()->route('dashboard.user.index');
    }

   
    public function show(User $user)
    {
        //
    }

  
    public function edit(User $user)
    {
        $title = 'Edit User';
        $subscription = Subscription::all();
        return view('admin.users.edit', compact('title', 'subscription', 'user'));
        
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name'            => 'required',
            'last_name'             => 'required',
            // 'email'              => 'required|email|unique:users',
            'password'              => 'sometimes|nullable|min:6',
            'featured'              => 'sometimes|nullable|image',
            'subscription_id'       => 'required',
        ]);

        $data = request()->except(['password', 'featured', '_method', '_token']);

        $data['password'] = bcrypt($request->password);

        if($request ->hasFile('featured')):
            if(file_exists($user->featured)):
                unlink($user->featured);
            endif;
             $file_new_name = 'uploads/users_profile/' . $request->featured->hashName();
            $request->featured->move('uploads/users_profile', $file_new_name);
            $data['featured'] =$file_new_name;
        endif;
        User::where('id', $user->id)->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.user.index');
    }

  
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();

    }
    public function trashed()
    {
        $title = 'Trashed Users';
        $users = User::onlyTrashed()
            ->get();
        return view('admin.users.trashed', compact('title', 'users'));


    }
    public function restore($id)
    {
        User::onlyTrashed()->where('id', $id)->restore();
        session()->flash('success', __('site.restored_successfully'));

        return redirect(route('dashboard.user.index'));

    }

    public function forcedelete( $id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        if(file_exists($user->featured)):
            unlink($user->featured);
        endif;
        $user->forceDelete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(route('dashboard.user.index'));

    }

    public function profile($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.profile')->withUser($user);
    }

    public function pending()
    {

    }

   
}
