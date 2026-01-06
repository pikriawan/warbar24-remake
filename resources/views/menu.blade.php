<x-customer-layout>
    @push('styles')
        @vite('resources/css/menu.css')
    @endpush
    <div class="menu-category-list">
        @foreach ($data as $category => $menus)
            <div>
                <h2>{{ $category === '' ? 'Uncategorized' : Str::title($category) }}</h2>
                <div class="menu-list">
                    @foreach ($menus as $menu)
                        <div>
                            <img class="menu-image" src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="128" height="128">
                            <h3>{{ $menu->name }}</h3>
                            <p>Harga: {{ $menu->price }}</p>
                            <p>Kategori: {{ $menu->category === null ? 'uncategorized' : $menu->category }}</p>
                            <p>{{ $menu->is_available ? 'Tersedia' : 'Habis' }}</p>
                            <form action="/cart" method="post">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                <input type="hidden" name="action" value="increment">
                                <button>Tambah</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-customer-layout>
