<?php

namespace App\Http\Controllers\Site;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    
    public function index(Request $request)
    {
        $title = 'Countries';

        $countries = Country::when($request->search, function($q) use ($request){
           return $q->where('name', 'like', '%' . $request->search . '%');

        })->paginate(5);

        return view('admin.countries.index', compact('countries', 'title'));
    }

   
    public function create()
    {
        $title = 'Add Country';

        return view('admin.countries.create', compact('title'));
    }

  
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  =>  'required'
        ]);
        Country::create($data);
        session()->flash('success', __('site.created_successfully'));
        return redirect(route('dashboard.country.index'));

    }

    
    public function show(Country $country)
    {
        //
    }

    
    public function edit(Country $country)
    {
        $title = 'Edit Country';
        
        return view('admin.countries.edit', compact('title', 'country'))->withCountry($country);
    }

   
    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'name'  =>  'required'
        ]);
        Country::where('id', $country->id)->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('dashboard.country.index'));
    }

  
    public function destroy(Country $country)
    {
        $country->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();
    }
}
