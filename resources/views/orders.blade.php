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
    @vite('resources/css/orders.css')
@endpush
<x-customer-layout>
    <main class="main">
        <h1 class="orders-title">Daftar Pesanan</h1>
        @if (count($orders) > 0)
            <div class="orders-list">
                @foreach ($orders as $order)
                    <a class="order-item" href="/order/{{ $order->id }}">
                        <div class="order-item-row">
                            <p class="order-item-text">Nomor pesanan</p>
                            <p class="order-item-text">{{ $order->id }}</p>
                        </div>
                        <div class="order-item-row">
                            <p class="order-item-text">Tanggal pemesanan</p>
                            <p class="order-item-text">{{ $order->checked_out_at->setTimezone('Asia/Jakarta')->format('d F Y, H:i:s') }}</p>
                        </div>
                        <div class="order-item-row">
                            <p class="order-item-text">Nama</p>
                            <p class="order-item-text">{{ $order->customer_name }}</p>
                        </div>
                        <div class="order-item-row">
                            <p class="order-item-text">Total bayar</p>
                            <p class="order-item-text">{{ formatRupiah($order->totalPrice) }}</p>
                        </div>
                        <div class="order-item-row">
                            <p class="order-item-text">Status pesanan</p>
                            @switch($order->status)
                                @case('pending')
                                    <p class="order-item-text order-item-text-danger">Belum diproses</p>
                                    @break
                                @case('processing')
                                    <p class="order-item-text order-item-text-warning">Sedang diproses</p>
                                    @break
                                @case('finished')
                                    <p class="order-item-text order-item-text-primary">Selesai</p>
                                    @break
                                @case('canceled')
                                    <p class="order-item-text order-item-text-primary">Dibatalkan</p>
                            @endswitch
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="orders-empty">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24" fill="none" stroke="#0A5D0C" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scroll-text-icon lucide-scroll-text"><path d="M15 12h-5"/><path d="M15 8h-5"/><path d="M19 17V5a2 2 0 0 0-2-2H4"/><path d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"/></svg>
                <p class="orders-empty-text">Kamu belum pesan apapun!</p>
                <a class="button button-primary" href="/menus">Yuk, pesan sekarang!</a>
            </div>
        @endif
    </main>
</x-customer-layout>
