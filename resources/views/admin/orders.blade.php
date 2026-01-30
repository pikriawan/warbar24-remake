@php
    function formatRupiah($number) {
        if (floor($number === $number)) {
            return 'Rp ' . number_format($number, 0, ',', '.') . ',-';
        } else {
            return 'Rp ' . number_format($number, 2, ',', '.');
        }
    }

    function getTotalPrice($order) {
        return $order->menus->reduce(function (?float $carry, $menu) {
            return $carry + $menu->price * $menu->pivot->menu_quantity;
        });
    }
@endphp
@push('styles')
    @vite('resources/css/admin-orders.css')
@endpush
<x-admin-layout>
    <div class="orders-container">
        <h1 class="orders-title">Pesanan</h1>
        @if (count($orders) > 0)
            <div class="orders-table">
                <div class="table-data">
                    <p class="table-text-strong">Nomor Pesanan</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Nama Pelanggan</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Tanggal Pemesanan</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Total Harga</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Status Pesanan</p>
                </div>
                <div class="table-data">
                    <p class="table-text-strong">Aksi</p>
                </div>
                @foreach ($orders as $order)
                    <div class="table-data">
                        <p class="table-text">{{ $order->id }}</p>
                    </div>
                    <div class="table-data">
                        <p class="table-text">{{ $order->customer_name }}</p>
                    </div>
                    <div class="table-data">
                        <p class="table-text">{{ $order->checked_out_at->setTimezone('Asia/Jakarta')->format('d F Y, H:i:s') }}</p>
                    </div>
                    <div class="table-data">
                        <p class="table-text">{{ formatRupiah(getTotalPrice($order)) }}</p>
                    </div>
                    <div class="table-data">
                        @switch($order->status)
                            @case('pending')
                                <p class="table-text table-text-danger">Belum diproses</p>
                                @break
                            @case('processing')
                                <p class="table-text table-text-warning">Sedang diproses</p>
                                @break
                            @case('finished')
                                <p class="table-text table-text-primary">Selesai</p>
                                @break
                            @case('canceled')
                                <p class="table-text table-text-primary">Dibatalkan</p>
                        @endswitch
                    </div>
                    <div class="table-data">
                        <div class="button-group">
                            <a class="button button-outlined" href="/admin/order/{{ $order->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                                Lihat rincian
                            </a>
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
                @endforeach
            </div>
        @else
            <p class="no-order">Tidak ada pesanan</p>
        @endif
    </div>
</x-admin-layout>
