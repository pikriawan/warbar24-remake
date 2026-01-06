<x-customer-layout>
    @push('styles')
        @vite('resources/css/cart.css')
    @endpush
    <div class="menu-list">
        @forelse ($menus as $menu)
            <div>
                <img class="menu-image" src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="128" height="128">
                <h3>{{ $menu->name }}</h3>
                <p>Harga: {{ $menu->price }}</p>
                <p>Jumlah di keranjang: {{ $menu->pivot->menu_quantity }}</p>
                <form action="/cart" method="post">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    <input type="hidden" name="action" value="increment">
                    <button>Tambah</button>
                </form>
                <form action="/cart" method="post">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    <input type="hidden" name="action" value="decrement">
                    <button>Kurangi</button>
                </form>
            </div>
        @empty
            <p>Keranjang kosong</p>
        @endforelse
    </div>
</x-customer-layout>
