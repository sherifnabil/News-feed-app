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
        <li class="active"> @lang('site.trashed_posts') </li>
      </ol>
    </section> 
    
    <div class="box margin-top ">
      <div class="box-header">
        <h3 class="box-title">{{ 'Posts' }}</h3>
        <small> <strong>{{ $posts->count() }} </strong> </small>

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
                <th class="text-center" >@lang('site.restore')</th>
                <th class="text-center" >@lang('site.delete')</th>
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
   
                    <td class="text-center" > <a href="{{ route('dashboard.post.restore', $post) }}" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i> @lang('site.restore')</a> </td>

                    <td class="text-center"> <a href="{{ route('dashboard.post.forcedelete', $post) }}" class="btn btn-sm btn-danger"> <i   class="fa fa-trash"></i> @lang('site.force')</a>  
                    </td>
                  </tr>
                @endforeach
                
              </tbody>
          </table>
        </div>
      @else
        <h2 class="text-center" >@lang('site.no_data_found')</h2> <br>
      @endif




      


      @stop