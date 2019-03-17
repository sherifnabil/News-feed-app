<?php

namespace App\Http\Controllers\Site;

use App\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function post_login()
    {
        $remember = request('rememberme') == 1 ? true : false;
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $remember)):
            return  redirect()->route('dashboard.dashboard'); else:
            session()->flash('success', trans('site.admin_incorrect_login'));

        return redirect()->route('dashboard.admin.login');
        endif;
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('dashboard.admin.login');
    }

    public function password_forgot()
    {
        return view('admin.login');
    }

    public function post_password_forgot()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard')->withTitle('Dashboard');
    }

    public function index(Request $request)
    {
        $admins = Admin::when($request->search, function($q) use( $request ){
             return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        $title = 'Admins Panel';

        return view('admin.admins.index', compact(['title', 'admins']));
    }

    public function create()
    {
        return view('admin.admins.create')->withTitle('Add Admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:admins',
            'password'  => 'required|min:6',
            'featured'  => 'required|image',
            'is_super'  => 'sometimes|nullable',
        ]);

        $data = request()->except(['password', 'featured', 'is_super']);

        $data['password'] = bcrypt($request->password);

        if($request->hasFile('featured')):
            $file_new_name = 'uploads/admins_profile/' . $request->featured->hashName();
            $request->featured->move('uploads/admins_profile', $file_new_name);
            $data['featured'] =$file_new_name;
        endif;
        
        $data['is_super'] = $request->is_super == 'on' ? 1 : 0;

        Admin::create($data);
        session()->flash('success', __('site.created_successfully'));
        return redirect()->route('dashboard.admin.index');
    }

    public function show(Admin $admin)
    {
    }

    public function edit(Admin $admin)
    {
        
        $title = 'Edit Admin';
        
        
        return view('admin.admins.edit', [ 'admin' => $admin, 'title' => $title]);
    }
    
    public function update(Request $request, Admin $admin)
    {
      
        $request->validate([
            'name'      => 'sometimes|nullable',
            // 'email'     =>  ['required', Rule::unique('admins')->ignore($admin->id)],
            'password'  => 'sometimes|nullable|min:6',
            'featured'  => 'sometimes|nullable|image',
            'is_super'  => 'sometimes|nullable',
        ]);

        $data = request()->except(['password', 'featured', 'is_super', '_token', '_method', 'email']);
        
        if($request->password){

            $data['password'] = bcrypt($request->password);
        } 

        if($request->hasFile('featured')):
             $file_new_name = 'uploads/admins_profile/' . $request->featured->hashName();
            $request->featured->move('uploads/admins_profile', $file_new_name);
            $data['featured'] =$file_new_name;
        endif;

        $data['is_super'] = $request->is_super == 'on' ? 1 : 0;

        Admin::where($admin->id)->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.admin.index');
        



    }

    public function destroy(Admin $admin)
    {
        $avatar = Admin::where('id', $admin->id)->first();

        if(file_exists($avatar->featured))
        {
            unlink( $avatar->featured);
        }
        $admin->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();
    }

}
