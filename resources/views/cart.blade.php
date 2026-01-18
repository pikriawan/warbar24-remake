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
    @vite('resources/css/cart.css')
@endpush
<x-customer-layout>
    <main class="main">
        <h1 class="cart-title">Keranjang</h1>
        @if (count($menus) > 0)
            <div class="menus-list">
                @foreach ($menus as $menu)
                    <div class="menu-item">
                        <img class="menu-item-image" src="{{ $menu->image === null ? '/images/menu-no-image.png' : asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="64" height="64">
                        <div class="menu-item-detail">
                            <p class="menu-item-title">{{ $menu->name }}</p>
                            <div class="menu-item-bottom">
                                <p class="menu-item-price">{{ formatRupiah($menu->price) }}</p>
                                <div class="menu-item-quantity">
                                    <form class="menu-item-quantity-form" action="/cart" method="post">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="action" value="decrement">
                                        <button class="button button-outlined menu-item-quantity-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus-icon lucide-minus"><path d="M5 12h14"/></svg>
                                        </button>
                                    </form>
                                    <span class="menu-item-quantity-text">{{ $menu->pivot->menu_quantity }}</span>
                                    <form class="menu-item-quantity-form" action="/cart" method="post">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="action" value="increment">
                                        <button class="button button-outlined menu-item-quantity-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="total-price">
                    <p>Total Harga</p>
                    <p>{{ formatRupiah($totalPrice) }}</p>
                </div>
            </div>
            <h1 class="payment-title">Pembayaran</h1>
            <form class="payment-form" action="/checkout" method="post">
                @csrf
                <div class="form-field">
                    <label class="label" for="search">Nama</label>
                    <input class="text-field" name="customer_name" placeholder="Nama Anda">
                </div>
                <button class="button button-primary">Bayar sekarang {{ formatRupiah($totalPrice) }}</button>
            </form>
        @else
            <div class="cart-empty">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24" fill="none" stroke="#0A5D0C" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-basket-icon lucide-shopping-basket"><path d="m15 11-1 9"/><path d="m19 11-4-7"/><path d="M2 11h20"/><path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4"/><path d="M4.5 15.5h15"/><path d="m5 11 4-7"/><path d="m9 11 1 9"/></svg>
                <p class="cart-empty-text">Keranjangmu kosong!</p>
                <a class="button button-primary" href="/menus">Yuk, isi keranjangmu sekarang!</a>
            </div>
        @endif
    </main>
</x-customer-layout>
