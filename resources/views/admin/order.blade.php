@php
    function formatRupiah($number) {
        if (floor($number === $number)) {
            return 'Rp' . number_format($number, 0, ',', '.') . ',-';
        } else {
            return 'Rp' . number_format($number, 2, ',', '.');
        }
    }
@endphp
@push('styles')
    @vite('resources/css/admin-order.css')
@endpush
<x-admin-layout>
    <div class="order-container">
        <div class="order-header">
            <a class="back-link" href="/admin/orders">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
            </a>
            <h1 class="order-title">Pesanan #{{ $order->id }}</h1>
        </div>
        <div class="order-detail">
            <div class="order-detail-row">
                <p class="order-detail-text">Tanggal pemesanan</p>
                <p class="order-detail-text">{{ $order->checked_out_at->setTimezone('Asia/Jakarta')->format('d F Y, H:i:s') }}</p>
            </div>
            <div class="order-detail-row">
                <p class="order-detail-text">Nama</p>
                <p class="order-detail-text">{{ $order->customer_name }}</p>
            </div>
            <div class="order-detail-row">
                <p class="order-detail-text">Total bayar</p>
                <p class="order-detail-text">{{ formatRupiah($totalPrice) }}</p>
            </div>
            <div class="order-detail-row">
                <p class="order-detail-text">Status pesanan</p>
                @switch($order->status)
                    @case('pending')
                        <p class="order-detail-text order-detail-text-danger">Belum diproses</p>
                        @break
                    @case('processing')
                        <p class="order-detail-text order-detail-text-warning">Sedang diproses</p>
                        @break
                    @case('finished')
                        <p class="order-detail-text order-detail-text-primary">Selesai</p>
                        @break
                    @case('canceled')
                        <p class="order-detail-text order-detail-text-primary">Dibatalkan</p>
                @endswitch
            </div>
        </div>
        <h1 class="order-menus-title">Daftar Menu Pesanan</h1>
        <div class="order-menus-list">
            @foreach ($order->menus as $menu)
                <div class="order-menu-item">
                    <div class="order-menu-item-row">
                        <p class="order-menu-item-title">Menu</p>
                        <p class="order-menu-item-text">{{ $menu->name }}</p>
                    </div>
                    <div class="order-menu-item-row">
                        <p class="order-menu-item-title">Harga</p>
                        <p class="order-menu-item-text">{{ formatRupiah($menu->price) }}</p>
                    </div>
                    <div class="order-menu-item-row">
                        <p class="order-menu-item-title">Jumlah</p>
                        <p class="order-menu-item-text">{{ $menu->pivot->menu_quantity }}</p>
                    </div>
                    <div class="order-menu-item-row">
                        <p class="order-menu-item-title">Subtotal</p>
                        <p class="order-menu-item-text">{{ formatRupiah($menu->price * $menu->pivot->menu_quantity) }}</p>
                    </div>
                </div>
            @endforeach
            <div class="order-menus-total-price">
                <p class="order-menus-total-price-text">Total bayar</p>
                <p class="order-menus-total-price-text">{{ formatRupiah($totalPrice) }}</p>
            </div>
        </div>
        <h2 class="order-actions-title">Aksi</h2>
        <div class="order-actions">
            <a class="button button-outlined" href="/admin/orders">Kembali</a>
            @if ($order->status === 'pending')
                <form class="form" action="/admin/order/{{ $order->id }}/status" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="processing">
                    <button class="button button-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                        Tandai diproses
                    </button>
                </form>
                <form class="form" action="/admin/order/{{ $order->id }}/status" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="canceled">
                    <button class="button button-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        Tandai dibatalkan
                    </button>
                </form>
            @elseif ($order->status === 'processing')
                <form class="form" action="/admin/order/{{ $order->id }}/status" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="finished">
                    <button class="button button-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                        Tandai selesai
                    </button>
                </form>
            @endif
        </div>
    </div>
</x-admin-layout>
