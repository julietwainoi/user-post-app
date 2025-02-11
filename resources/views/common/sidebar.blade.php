<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> -->
        <span class="brand-text font-weight-light">User-post</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
       <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>-->

        <!-- SidebarSearch Form -->
        <!--<div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                
                <li class="nav-item">
                    <a href="{{route('posts.postform')}}" class="nav-link">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                        postsform
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
        
            
                <li class="nav-item">
                  <a href="{{route('posts.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        posts
                          <i class="right fas fa-angle-right"></i>
                      </p>
                  </a>
              </li>
             
                <li class="nav-item">
                    <a href="{{route('profile.edit')}}" class="nav-link">
                      <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                         Edit Account Details
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
              
                <li class="nav-item">
                    <a href="{{route('github-repositories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                        github-repositories
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal-details.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                        personal-details
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
        
        <li class="nav-item">
            <a href="{{route('educations.index')}}" class="nav-link">
                <i class="nav-icon fa fa-window-restore"></i>
                <p>
                educations
                    <i class="right fas fa-angle-right"></i>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('profileInformation.combinedIndex')}}" class="nav-link">
                <i class="nav-icon fa fa-window-restore"></i>
                <p>
                profile Information
                    <i class="right fas fa-angle-right"></i>
                </p>
            </a>
        </li>
   
                
              <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-arrow-right"></i>
                    <p>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>