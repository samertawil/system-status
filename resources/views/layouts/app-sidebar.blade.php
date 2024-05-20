 

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('media/html/pic/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="{{ asset('media/html/pic/undraw_profile_2.svg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div> --}}
            <div class="info">
                {{-- <a href="#" class="d-block">Alexander Pierce</a> --}}

                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->full_name }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('media/html/pic/undraw_profile.svg') }}">
                </a>
                <a class="dropdown-item exit1" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-light exit2"></i>
                    <span class="text-light">logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>


            </div>





        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
       <li class="nav-item menu-close">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
             مستخدمين وصلاحيات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                 <a href="{{route('admin.users.index')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ادارة المستخدمين </p>
                 
                </a>
            </li>
            
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                 <a href="{{route('admin.roles.index',0)}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                   
                    <p> ادارة مجموعات الصلاحيات </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.abilities.index')}}" class="nav-link active">
                   <i class="far fa-circle nav-icon"></i>
                  
                   <p> ادارة الصلاحيات </p>
               </a>
           </li>
           
            
        </ul>
        
    </li>


        
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           بطاقات الموقع
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/cards/')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ادارة البيانات</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="nav-item menu-close">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          ثوابت النظام
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('status.create')
                    {{-- http://bloggi.test/admin/status/create --}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                             <a href="{{route('admin.status.create')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافة بيانات</p>
                             
                            </a>
                        </li>
                        
                    </ul>
                    @endcan
                    
                     @can('status.view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                             <a href="{{route('admin.status.index')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                               
                                <p>ادارة البيانات</p>
                            </a>
                        </li>
                        
                    </ul>
                    @endcan
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                             <a href="{{route('user.category.index')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                               
                                <p>ادارة التصنيفات</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>


                
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                         المدونة
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                             <a href="{{route('user.post.create')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافة مدونة</p>
                             
                            </a>
                        </li>
                        
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                             <a href="{{route('blogsindex')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                               
                                <p>صفحة المدونات العامة </p>
                            </a>
                        </li>
                        
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                             <a href="{{route('blogsindex')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                               
                                <p> مدوناتي</p>
                            </a>
                        </li>
                        
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                             <a href="{{route('user.post.index',Auth::id())}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                               
                                <p>ادارة مدوناتي</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>


                <li class="nav-item menu-close">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
