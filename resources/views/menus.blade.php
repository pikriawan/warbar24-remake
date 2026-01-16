<x-customer-layout>
    @push('styles')
        @vite('resources/css/menus.css')
    @endpush
    <main class="main">
        <h1 class="menus-title">Mau Pesan Apa Hari Ini?</h1>
        <form class="search-form">
            @if (request('category') !== null)
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <div class="form-field">
                <label class="label" for="search">Cari Menu</label>
                <div class="form-field-row">
                    <input class="text-field" type="search" name="search" value="{{ request('search') }}" placeholder="Telur Balado">
                    <button class="button button-primary">Cari</button>
                </div>
            </div>
        </form>
        <div class="filters">
            <form>
                @if (request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <input type="hidden" name="category" value="">
                <button class="button button-outlined filter{{ request('category') === null ? ' selected' : '' }}">
                    <svg class="filter-check-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                    Semua
                </button>
            </form>
            @foreach ($categories as $category)
                <form>
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <input type="hidden" name="category" value="{{ $category }}">
                    <button class="button button-outlined filter{{ request('category') === $category ? ' selected' : '' }}">
                        <svg class="filter-check-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                        {{ Str::title($category) }}
                    </button>
                </form>
            @endforeach
        </div>
        @if (count($data) > 0)
            @foreach ($data as $category => $menus)
                <div class="menus-category">
                    <h2 class="menus-category-title">{{ $category === '' ? 'Lainnya' : Str::title($category) }}</h2>
                    <div class="menus-category-list">
                        @foreach ($menus as $menu)
                            <div class="menus-item">
                                <div class="menus-item-top">
                                    <img class="menus-item-image" src="{{ $menu->image === null ? '/images/menu-no-image.png' : asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}">
                                    <h3 class="menus-item-title">{{ $menu->name }}</h3>
                                    <p class="menus-item-price">{{ floor($menu->price) == $menu->price ? 'Rp ' . number_format($menu->price, 0, ',', '.') . ',-' : 'Rp ' . number_format($menu->price, 2, ',', '.') }}</p>
                                </div>
                                <form class="menus-item-add-form" action="/cart" method="post">
                                    @csrf
                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                    <input type="hidden" name="action" value="increment">
                                    <button class="button button-primary">Tambah</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <p>Menu tidak ditemukan</p>
        @endif
    </main>
</x-customer-layout>
