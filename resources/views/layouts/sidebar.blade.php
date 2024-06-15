<nav id="sidebar" class="sidebar-wrapper sidebar-colored">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand text-center">
            <a href="index.html" class="text-white">
                Dashboard
                <!-- <img src="/backoffice/assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                <img src="/backoffice/assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                <span class="sidebar-colored">
                    <img src="/backoffice/assets/images/logo-light.png" height="24" alt="">
                </span> -->
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}"><a
                    href="{{ route('dashboard.index') }}"><i class="ti ti-home me-2"></i>Dashboard</a>
            </li>

            <li class="{{ request()->routeIs('member*') ? 'active' : '' }}">
                <a href="{{ route('member.index') }}"><i class="ti ti-users me-2"></i>Member</a>
            </li>
            <li class="{{ request()->routeIs('store*') ? 'active' : '' }}">
                <a href="{{ route('store.index') }}"><i class="mdi mdi-store me-2"></i>Toko</a>
            </li>
            <li class="{{ request()->routeIs('theme*') ? 'active' : '' }}">
                <a href="{{ route('theme.index') }}"><i class="mdi mdi-shape me-2"></i>Tema website</a>
            </li>
            {{-- 

            <li class="sidebar-dropdown {{ request()->routeIs('article*') ? 'active' : '' }}">
                <a href="javascript:void(0)"><i class="ti ti-apps me-2"></i>Data Artikel</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{ route('articles.index') }}">Artikel</a></li>
                        <li><a href="{{ route('article-categories.index') }}">Kategori</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-dropdown {{ request()->routeIs('settings*') ? 'active' : '' }}">
                <a href="javascript:void(0)"><i class="ti ti-settings me-2"></i>Pengaturan website</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{ route('pages.index') }}">Halaman</a></li>
                        <li><a href="{{ route('website.settings') }}">Informasi Website</a></li>
                    </ul>
                </div>
            </li> --}}




        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
