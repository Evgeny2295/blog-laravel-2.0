
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('main.index')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Блог</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('personal.liked.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Понравилось
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.comment.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Комментарии
                        </p>
                    </a>
                </li>
                @if(\App\Models\User::getRoles()[auth()->user()->role=== 'admin'])
                <li class="nav-item">
                    <a href="{{route('admin.main.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Панель адмнистратора
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
