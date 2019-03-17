<?php

namespace App\Http\Controllers\Site;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
   
    public function index( Request $request)
    {
        
        $subscriptions = Subscription::when($request->search, function($q) use( $request){
             return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        $title = 'Subscribing Plans';

        return view('admin.subscriptions.index', compact('subscriptions', 'title'));
    }

    
    public function create()
    {
        return view('admin.subscriptions.create');
        
    }

 
    public function store(Request $request)
    {
        // dd(request());
         $this->validate(request() ,[
            'name'                  =>  'required:unique:subscriptions',
            'price'                 =>  'required|numeric',
            'features'              =>  'required|array|min:2',
            'notification_type'     =>  'required',
            'icon'                  =>  'required|image',
            ]);
        $data = request()->except(['_token', 'features', 'icon']);
        if($request->hasFile('icon')):
            $file_new_name = 'uploads/subscriptions_icons/' . $request->icon->hashName();
            $request->icon->move( 'uploads/subscriptions_icons', $file_new_name);
            $data['icon'] =$file_new_name;
        endif;
        $feature = [];
        if(request()->features):
            foreach (request()->features as $f):
                if (!empty($f)):
                    $feature[] = $f;
                endif;
            endforeach;
        endif;
        $data['features'] =  implode('###', $feature);
        Subscription::create($data);
        session()->flash('success', __('site.created_successfully'));
        return redirect()->route( 'dashboard.subscription.index');
    }

    
    public function show(Subscription $subscription)
    {
        $title = 'Plan View';
        return view('admin.subscriptions.show', compact('subscription', 'title'));
    }

 
    public function edit(Subscription $subscription)
    {
        $title = 'Edit Plan';
        $d =  $subscription;
        return view('admin.subscriptions.edit', ['subscription' => $d]);
    }

   
    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            // 'name'                  =>  'sometimes|required:unique:subscriptions',
            'price'                 =>  'required|numeric',
            'features'              =>  'required|array|min:2',
            'notification_type'     =>  'required',
            'icon'                  =>  'sometimes|nullable|image',
            ]);
        $data = request()->except(['_token', 'features', 'icon', '_method']);
        if($request->hasFile('icon')):
            if(file_exists($subscription->icon))
            {
                unlink($subscription->icon);
            }
            $file_new_name = 'uploads/subscriptions_icons/' . $request->icon->hashName();
            $request->icon->move( 'uploads/subscriptions_icons', $file_new_name);
            $data['icon'] =$file_new_name;
        endif;
        $feature = [];
        if(request()->features):
            foreach (request()->features as $f):
                if (!empty($f)):
                    $feature[] = $f;
                endif;
            endforeach;
        endif;
        $data['features'] =  implode('###', $feature);
        Subscription::where('id', $subscription->id)->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('dashboard.subscription.index'));
    }

   
    public function destroy(Subscription $subscription)
    {
        if(file_exists($subscription->icon))
        {
            unlink($subscription->icon);
        }
        $subscription->delete();
        return back();
    }
}
