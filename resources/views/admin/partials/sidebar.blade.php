<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

        @include('admin.partials.authLogo')

    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item @yield('home_active')">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div>{{ __('lang.dashboard') }}</div>
            </a>
        </li>

        <li class="menu-item @yield('admins_active')">
            <a href="{{ route('admin.admins.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div>{{ __('lang.admins') }}</div>
            </a>
        </li>

        <li class="menu-item @yield('users_active')">
            <a href="{{ route('admin.users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>{{ __('lang.users') }}</div>
            </a>
        </li>

        <li class="menu-item @yield('categories_active')">
            <a href="{{ route('admin.categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div>{{ __('lang.categories') }}</div>
            </a>
        </li>

        <li class="menu-item @yield('brands_active')">
            <a href="{{ route('admin.brands.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div>{{ __('lang.brands') }}</div>
            </a>
        </li>

        <li class="menu-item @yield('products_active')">
            <a href="{{ route('admin.products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div>{{ __('lang.products') }}</div>
            </a>
        </li>
    </ul>
</aside>
