<x-customer-layout>
    @push('styles')
        @vite('resources/css/order.css')
    @endpush
    <div>
        <p>Nomor pesanan: {{ $order->id }}</p>
        <p>Nama: {{ $order->customer_name }}</p>
        <p>Total bayar: {{ $order->menus->reduce(fn (?float $carry,  $menu) => $carry + $menu->pivot->menu_quantity * $menu->price) }}</p>
        <p>Status pesanan: {{ $order->status }}</p>
        @if ($order->status === 'pending')
            <form action="/order/{{ $order->id }}/cancel" method="post">
                @csrf
                @method('put')
                <button>Batalkan pesanan</button>
            </form>
            <p>*Silahkan lakukan pembayaran melalui kasir</p>
        @endif
        <div>
            <h3>Daftar menu</h3>
            <table>
                <thead>
                    <tr>
                        <th class="table-header">Nama menu</th>
                        <th class="table-header">Jumlah</th>
                        <th class="table-header">Harga</th>
                        <th class="table-header">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->menus as $menu)
                        <tr>
                            <td class="table-data">{{ $menu->name }}</td>
                            <td class="table-data">{{ $menu->pivot->menu_quantity }}</td>
                            <td class="table-data">{{ $menu->price }}</td>
                            <td class="table-data">{{ $menu->pivot->menu_quantity * $menu->price }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="table-data" colspan="3">Total harga</td>
                        <td class="table-data">{{ $order->menus->reduce(fn (?float $carry,  $menu) => $carry + $menu->pivot->menu_quantity * $menu->price) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-customer-layout>
