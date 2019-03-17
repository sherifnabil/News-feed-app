  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <img src="{{ auth()->user()->admin_profile }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ auth()->user()->admin_name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
              <a href="{{ route('dashboard.dashboard') }}">
                <i class="fa fa-desktop"></i> <span>@lang('site.dashboard') </span>
                <span class="pull-right-container"></span>
              </a>
            </li>
            <li class="{{ request()->segment(2) == 'admin' ? 'active' : '' }}">
                <a href="{{ route('dashboard.admin.index') }}">
                  <i class="fa fa-users"></i> <span> @lang('site.admins') </span>
                  <span class="pull-right-container"></span>
                </a>
            </li>


            <li class="treeview menu {{ request()->segment(2) == 'user' ? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-users"></i> <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" >
                <li class="">
                      <a href="{{ route('dashboard.user.index') }}">
                        <i class="fa fa-users"></i> <span> @lang('site.users') </span>
                        <span class="pull-right-container"></span>
                      </a>
                    </li>
        
                    <li class="">
                        <a href="{{ route('dashboard.user.trashed') }}">
                          <i class="fa fa-user-times"></i> <span> @lang('site.trashed_users') </span>
                          <span class="pull-right-container"></span>
                        </a>
                    </li>
              </ul>
            </li>
            
            
              
            <li class="{{ request()->segment(2) == 'subscription' ? 'active' : '' }}">
              <a href="{{ route('dashboard.subscription.index') }}">
                <i class="fa fa-bar-chart-o"></i> <span> @lang('site.subscription') </span>
                <span class="pull-right-container"></span>
              </a>
            </li>



            <li class="{{ request()->segment(2) == 'country' ? 'active' : '' }}">
              <a href="{{ route('dashboard.country.index') }}">
                <i class="fa fa-flag"></i> <span> @lang('site.countries') </span>
                <span class="pull-right-container"></span>
              </a>
            </li>
            <li class="{{ request()->segment(2) == 'city' ? 'active' : '' }}">
              <a href="{{ route('dashboard.city.index') }}">
                  <i class="fa fa-flag"></i> <span> @lang('site.cities') </span>
                    <span class="pull-right-container"> </span>
              </a>
            </li>

              <li class="{{ request()->segment(2) == 'category' ? 'active' : '' }}">
                <a href="{{ route('dashboard.category.index') }}">
                  <i class="fa fa-paperclip"></i> <span> @lang('site.categories') </span>
                  <span class="pull-right-container"></span>
                </a>
              </li>

              <li class="treeview menu {{ request()->segment(2) == 'post' ? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-paper-plane"></i> <span>Posts</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" >
               
                <li class="">
                  <a href="{{ route('dashboard.post.index') }}">
                    <i class="fa fa-paper-plane"></i> <span> @lang('site.posts') </span>
                    <span class="pull-right-container"></span>
                  </a>
                </li>
    
                <li class="">
                  <a href="{{ route('dashboard.post.pending') }}">
                    <i class="fa fa-hourglass-end"></i> <span> @lang('site.pending_posts') </span>
                    <span class="pull-right-container"></span>
                  </a>
                </li>
                <li class="{{ request()->segment(2) == 'refused-posts' ? 'active' : '' }}">
                  <a href="{{ route('dashboard.post.refused') }}">
                    <i class="fa fa-ban"></i> <span> @lang('site.refused_posts') </span>
                    <span class="pull-right-container"></span>
                  </a>
                </li>
    
    
                <li class="{{ request()->segment(2) == 'trashed-posts' ? 'active' : '' }}">
                  <a href="{{ route('dashboard.post.trashed') }}">
                    <i class="fa fa-trash"></i> <span> @lang('site.trashed_posts')</span>
                    <span class="pull-right-container"></span>
                  </a>
              </li>
              </ul>
            </li>





            <li class="{{ request()->segment(2) == 'tag' ? 'active' : '' }}">
              <a href="{{ route('dashboard.tag.index') }}">
                  <i class="fa fa-tags"></i> <span> @lang('site.tags') </span>
                    <span class="pull-right-container"></span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
        </aside>