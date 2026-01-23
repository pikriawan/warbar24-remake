@php
    use Illuminate\Support\Facades\Auth;

    $admin = Auth::guard('admin')->user();
@endphp
@push('styles')
    @vite('resources/css/admin-sidebar.css')
@endpush
@push('scripts')
    @vite('resources/js/admin-sidebar.js')
@endpush
<header class="mobile-header">
    <button class="button-base sidebar-action" id="sidebarShowButton">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-panel-right-icon lucide-panel-right"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 3v18"/></svg>
    </button>
    <a href="/admin/dashboard">
        <img src="/images/warteg-bahari-24.svg" alt="Warteg Bahari 24" width="128">
    </a>
    <div class="mobile-header-balancer"></div>
</header>
<aside class="sidebar" id="sidebar">
    <header class="sidebar-header">
        <div class="sidebar-header-top">
            <a href="/admin/dashboard">
                <img src="/images/warteg-bahari-24.svg" alt="Warteg Bahari 24" width="128">
            </a>
            <button class="button-base sidebar-action" id="sidebarHideButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-panel-right-icon lucide-panel-right"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 3v18"/></svg>
            </button>
        </div>
        <nav class="navbar">
            <a class="navbar-link{{ request()->path() === 'admin/dashboard' ? ' active' : '' }}" href="/admin/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-grid-icon lucide-layout-grid"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                Dashboard
            </a>
            <a class="navbar-link{{ request()->path() === 'admin/menus' ? ' active' : '' }}" href="/admin/menus">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils-icon lucide-utensils"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>
                Menu
            </a>
            <a class="navbar-link{{ request()->path() === 'admin/orders' ? ' active' : '' }}" href="/admin/orders">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scroll-text-icon lucide-scroll-text"><path d="M15 12h-5"/><path d="M15 8h-5"/><path d="M19 17V5a2 2 0 0 0-2-2H4"/><path d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"/></svg>
                Pesanan
            </a>
        </nav>
    </header>
    <div class="profile">
        <p class="profile-title">{{ $admin->username }}</p>
        <form class="logout-form" action="/admin/logout" method="post">
            @csrf
            <button class="button-base logout-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
            </button>
        </form>
    </div>
</aside>
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
