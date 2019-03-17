@extends('partials.main')
@section('content')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('dashboard.dashboard') }} "><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> @lang('site.tags') </li>
      </ol>
    </section> 
    
    <div class="box margin-top ">
      <div class="box-header">
        <h3 class="box-title"> Tags </h3>
        <small> <strong>{{ $tags->count() }} </strong> </small>
        <br>        <br>        
          <div class="form-group">
            <form action="{{ route('dashboard.tag.index') }}" method="get"  >
              <div class="row">
                <div class="col-md-4">
                  <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="@lang('site.search_tag')" >
                </div>
                <button type="submit" class="btn btn-md btn-warning "><i class="fa fa-search"></i> @lang('site.search') </button>
                <a href="{{ route('dashboard.tag.create') }}" class="btn btn-primary"> <i class="fa fa-plus"> @lang('site.new')</i> </a>
              </div>
            </form>
          </div>
          </div>
          
        @if ($tags->count() > 0)
            
        <div class="box-body">
          <table  class="table table-bordered table-hover">
            <thead  >                  
              <tr class="text-center">
                <th class="text-center" >#</th>
                <th class="text-center" >@lang('site.tag_name')</th>
                <th class="text-center" >@lang('site.edit')</th>
                <th class="text-center" >@lang('site.delete')</th>
              </tr>
            </thead>
              <tbody>
                @foreach ($tags as $tag)
                  <tr>  
                    <td class="text-center" > {{ $tag->id }} </td>
                    <td class="text-center" > {{ $tag->name}} </td>   
                    <td class="text-center" > <a href=" {{ route('dashboard.tag.edit', $tag->id) }} " class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> Edit</a> </td>
                    <td class="text-center">
                      <form action="{{ route('dashboard.tag.destroy', $tag->id) }}" method="post" >
                        {{ csrf_field() }} 
                        {{ method_field('delete') }}
                         <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash"> Delete</i> </button> 
                        </form>
                      </td>
                  </tr>
                @endforeach
                
              </tbody>
          </table>
          {{ $tags->appends(request()->query())->links() }}        
        </div>
      @else
        <h2 class="text-center" >@lang('site.no_data_found')</h2> <br>
      @endif




      


      @stop