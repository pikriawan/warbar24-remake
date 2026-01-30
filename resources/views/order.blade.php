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
    @vite('resources/css/order.css')
@endpush
<x-customer-layout>
    <main class="main">
        <h1 class="order-title">
            @switch($order->status)
                @case('pending')
                    Selesaikan Pembayaran!
                    @break
                @case('processing')
                    Pembayaran Berhasil!
                    @break
                @case('finished')
                    Pesanan Selesai!
                    @break
                @case('canceled')
                    Pesanan Dibatalkan!
            @endswitch
        </h1>
        <div class="order-info">
            @switch($order->status)
                @case('pending')
                    <p class="order-info-text">Lakukan pembayaran melalui kasir!</p>
                    <form action="/order/{{ $order->id }}/cancel" method="post">
                        @csrf
                        @method('put')
                        <button class="button button-danger">Batalkan pesanan</button>
                    </form>
                    @break
                @case('processing')
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24" fill="none" stroke="#00B700" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                    <p class="order-info-text">Pesananmu sedang kami proses! Silahkan tunggu!</p>
                    @break
                @case('finished')
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24" fill="none" stroke="#00B700" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                    <p class="order-info-text">Pesananmu selesai! Selamat menikmati!</p>
                    <a class="button button-primary" href="/menus">Pesan lagi</a>
                    @break
                @case('canceled')
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24" fill="none" stroke="#00B700" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                    <p class="order-info-text">Pesananmu berhasil dibatalkan!</p>
                    <a class="button button-primary" href="/menus">Pesan lagi</a>
            @endswitch
        </div>
        <h1 class="order-detail-title">Detail Pesanan</h1>
        <div class="order-detail">
            <div class="order-detail-row">
                <p class="order-detail-text">Nomor pesanan</p>
                <p class="order-detail-text">{{ $order->id }}</p>
            </div>
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
    </main>
</x-customer-layout>
