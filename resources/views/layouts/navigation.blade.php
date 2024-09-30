<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="{{ asset('img/icon.svg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/no_photo.svg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-header">General</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link @if (Request::segment(2) == 'product') active @endif">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">

                        <li class="nav-item">
                            <a href="{{ route('product.index') }}"
                                class="nav-link @if (Request::segment(2) == 'product') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item mt-4">
                    <a href="#" class="nav-link bg-danger">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
