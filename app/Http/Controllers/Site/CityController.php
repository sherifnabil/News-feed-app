<?php

namespace App\Http\Controllers\Site;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    
    public function index(Request $request)
    {
        $title = 'Cities';
        $cities = City::when($request->search, function($q)  use ($request){
             return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        return view('admin.cities.index', compact('cities', 'title'));    
        
    }

  
    public function create()
    {
        $countries = Country::all();
        $title = 'Add City';
        return view('admin.cities.create', compact('title', 'countries'));
        
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name'          =>  'required',
            'country_id'    =>  'required',
        ]);
        City::create($data);
        session()->flash('success', __('site.created_successfully'));
        return redirect(route('dashboard.city.index'));
    }

   
    public function show(City $city)
    {
        //
    }

    
    public function edit(City $city)
    {
        $countries = Country::all();

        $title = 'Edit City';
        return view('admin.cities.edit', compact('title', 'city', 'countries'));
    }

  
    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'name'          =>  'required',
            'country_id'    =>  'required',
        ]);

        City::where('id', $city->id)->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('dashboard.city.index'));
    }

    
    public function destroy(City $city)
    {
        $city->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();
    }
}
