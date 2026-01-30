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
    @vite('resources/css/admin-dashboard.css')
@endpush
<x-admin-layout>
    <div class="dashboard-container">
        <h1 class="dashboard-title">Dashboard</h1>
        <div class="dashboard-content">
            <div class="card">
                <div class="card-icon-container card-icon-container-green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#00B700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dollar-sign-icon lucide-circle-dollar-sign"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                </div>
                <p class="card-text">Total Pendapatan</p>
                <p class="card-display-text">{{ formatRupiah($totalRevenue) }}</p>
            </div>
            <div class="card">
                <div class="card-icon-container card-icon-container-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0066FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dollar-sign-icon lucide-circle-dollar-sign"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                </div>
                <p class="card-text">Total Pesanan Selesai</p>
                <p class="card-display-text">{{ $totalSales }}</p>
            </div>
            <div class="card">
                <div class="card-icon-container card-icon-container-orange">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#FF5100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dollar-sign-icon lucide-circle-dollar-sign"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                </div>
                <p class="card-text">Total Menu</p>
                <p class="card-display-text">{{ $totalMenus }}</p>
            </div>
        </div>
    </div>
</x-admin-layout>
