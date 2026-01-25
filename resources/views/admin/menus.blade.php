@php
    function formatRupiah($number) {
        if (floor($number === $number)) {
            return 'Rp ' . number_format($number, 0, ',', '.') . ',-';
        } else {
            return 'Rp ' . number_format($number, 2, ',', '.');
        }
    }
@endphp
@push('styles')
    @vite('resources/css/admin-menus.css')
@endpush
<x-admin-layout>
    <div class="menus-container">
        <header class="menus-header">
            <h1 class="menus-title">Menu</h1>
            <a class="button button-primary" href="/admin/menu/create">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Buat menu baru
            </a>
        </header>
        @if (count($menus) > 0)
            <div class="menus-table">
                <div class="table-data">
                    <p class="table-text-strong">Nama</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Gambar</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Harga</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Kategori</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Tersedia</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Aksi</p>
                </div>
                @foreach ($menus as $menu)
                    <div class="table-data">
                        <p class="table-text">{{ $menu->name }}</p>
                    </div>
                    <div class="table-data">
                        <img class="table-image" src="{{ $menu->image === null ? '/images/menu-no-image.png' : asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="64" height="64">
                    </div>
                    <div class="table-data">
                        <p class="table-text">{{ formatRupiah($menu->price) }}</p>
                    </div>
                    <div class="table-data">
                        <p class="table-text">{{ Str::title($menu->category) }}</p>
                    </div>
                    <div class="table-data">
                        <p class="table-text">{{ $menu->is_available ? 'Ya' : 'Tidak' }}</p>
                    </div>
                    <div class="table-data">
                        <a class="button button-primary" href="/admin/menu/{{ $menu->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                            Edit menu
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Tidak ada menu</p>
        @endif
    </div>
</x-admin-layout>
