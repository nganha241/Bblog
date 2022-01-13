
    <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Quản trị</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('profile')}}" class="d-block">{{Auth::user()->name}}</a>
          <div>
            <form action="{{route('auth.logout')}}" method="POST">
            @csrf
            <button class="btn btn-link">Logout</button>
          </form>
          </div>
        </div>
      </div>

      <?php $routeName = \Request::route()->getName();  ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link
                @if (in_array($routeName, ['dashboard']))
                active
                @endif
                ">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Trang chủ
                  </p>
                </a>
              </li>
              {{-- User --}}
              <li class="nav-item 
              @if (in_array($routeName, ['admin.users', 'admin.users.create', 'admin.users.edit']))
                menu-open
              @endif
              ">
              <a href="{{route('admin.users')}}" class="nav-link 
              @if (in_array($routeName, ['admin.users', 'admin.users.create', 'admin.users.edit']))
                  active
                @endif
              ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Người dùng
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.users')}}" class="nav-link 
                  @if (in_array($routeName, ['admin.users']))
                  active
                  @endif
                  ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách người dùng</p>
                  </a>
                </li>
  
                <li class="nav-item">
                  <a href="{{route('admin.users.create')}}" class="nav-link
                  @if (in_array($routeName, ['admin.users.create']))
                  active
                  @endif
                  ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tạo người dùng mới</p>
                  </a>
                </li>
              </ul>
            </li>
              {{-- categoy --}}
          <li class="nav-item 
            @if (in_array($routeName, ['admin.categories', 'admin.categories.create', 'admin.categories.edit']))
              menu-open
            @endif
            ">
            <a href="{{route('admin.categories')}}" class="nav-link 
            @if (in_array($routeName, ['admin.categories', 'admin.categories.create', 'admin.categories.edit']))
                active
              @endif
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Danh mục bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.categories')}}" class="nav-link 
                @if (in_array($routeName, ['admin.categories']))
                active
                @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.categories.create')}}" class="nav-link
                @if (in_array($routeName, ['admin.categories.create']))
                active
                @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo danh mục mới</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- post --}}
          <li class="nav-item 
          @if (in_array($routeName, ['admin.posts', 'admin.posts.create', 'admin.posts.edit']))
            menu-open
          @endif
          ">
            <a href="{{route('admin.posts')}}" class="nav-link 
            @if (in_array($routeName, ['admin.posts', 'admin.posts.create', 'admin.posts.edit']))
                active
              @endif
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.posts')}}" class="nav-link 
                @if (in_array($routeName, ['admin.posts']))
                active
                @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.posts.create')}}" class="nav-link
                @if (in_array($routeName, ['admin.posts.create']))
                active
                @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo bài viết mới</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- tag --}}
          <li class="nav-item 
          @if (in_array($routeName, ['admin.tags', 'admin.tags.create', 'admin.tags.edit']))
            menu-open
          @endif
          ">
            <a href="{{route('admin.tags')}}" class="nav-link 
            @if (in_array($routeName, ['admin.tags', 'admin.tags.create', 'admin.tags.edit']))
                active
              @endif
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tag
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.tags')}}" class="nav-link 
                @if (in_array($routeName, ['admin.tags']))
                active
                @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tag</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.tags.create')}}" class="nav-link
                @if (in_array($routeName, ['admin.tags.create']))
                active
                @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo tag mới</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- //tag --}}
        </ul>
      </nav>
    </div>
  </aside>
