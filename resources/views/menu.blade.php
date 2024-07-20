<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('surat.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- SVG Path Definitions -->
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Arsip Desa</span>
        </a>

        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Menu items -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
        
        <li class="menu-item {{ request()->is('surat*') ? 'active' : '' }}">
            <a href="{{ route('surat.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Arsip</div>
            </a>
        </li>
        
        <li class="menu-item {{ request()->is('kategori*') ? 'active' : '' }}">
            <a href="{{ route('kategori.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Kategori Surat</div>
            </a>
        </li>
        
        <li class="menu-item {{ request()->is('about') ? 'active' : '' }}">
            <a href="{{ route('about') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">About</div>
            </a>
        </li>
    </ul>
</aside>
