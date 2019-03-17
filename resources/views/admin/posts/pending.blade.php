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
        <li class="active"> @lang('site.pending_posts') </li>
      </ol>
    </section> 
    
    <div class="box margin-top ">
      <div class="box-header">
        <h3 class="box-title">{{ 'Posts' }}</h3>
        <small> <strong>{{ $posts->count() }} </strong> </small>
        <br>        <br>        
          <div class="form-group">
            <form action="{{ route('dashboard.post.index') }}" method="get"  >
              <div class="row">
                <div class="col-md-4">
                  <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="@lang('site.search_post')" >
                </div>
                <button type="submit" class="btn btn-md btn-warning "><i class="fa fa-search"></i> @lang('site.search') </button>
              </div>
            </form>
          </div>
          </div>
          
        @if ($posts->count() > 0)
            
        <div class="box-body">
          <table  class="table table-bordered table-hover">
            <thead  >                  
              <tr class="text-center">
                <th class="text-center" >#</th>
                <th class="text-center" >@lang('site.post_title')</th>
                <th class="text-center" >@lang('site.post_featured')</th>
                <th class="text-center" >@lang('site.post_summary')</th>
                <th class="text-center" >@lang('site.posted_by')</th>
                <th class="text-center" >@lang('site.post_category')</th>
                <th class="text-center" >@lang('site.edit')</th>
                <th class="text-center" >@lang('site.activate')</th>
                <th class="text-center" >@lang('site.post_view')</th>
              </tr>
            </thead>
              <tbody>
                @foreach ($posts as $post)
                  <tr>  
                    <td class="text-center" > {{ $post->id }} </td>
                    <td class="text-center" > {{ $post->title}} </td>   
                    <td class="text-center" > <img src="{{ $post->main_image }}" style="width=70px; height:50px"> </td>
                    <td class="text-center" > {!! $post->summary !!} </td>
                    <td class="text-center" > {{ $post->user->first_namee . ' ' . $post->user->last_namee }}</td>
                    <td class="text-center" > {{ $post->category->cat_name }}</td>
   
                    <td class="text-center" > <a href=" {{ route('dashboard.post.activate', $post) }} " class="btn btn-sm btn-success"> <i class="fa fa-edit"></i> @lang('site.activate')</a> </td>
                    <td class="text-center" > <a href=" {{ route('dashboard.post.refuse', $post) }} " class="btn btn-sm btn-danger"> <i class="fa fa-edit"></i> @lang('site.refuse')</a> </td>
                    
                    <td class="text-center" > <a href=" {{ route('dashboard.post.show', $post) }} " class="btn btn-sm btn-default"> <i class="fa fa-eye"></i> @lang('site.post_view')</a></td>
                  </tr>
                @endforeach
                
              </tbody>
          </table>
          {{ $posts->appends(request()->query())->links() }}        
        </div>
      @else
        <h2 class="text-center" >@lang('site.no_data_found')</h2> <br>
      @endif




      


      @stop