@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard">

    <div class="dashboard-header">
        <div>
            <h1>Dashboard</h1>
            <p>
                Selamat datang,
                <strong>{{ Auth::user()->username }}</strong>
            </p>
        </div>
    </div>

    {{-- STATISTICS --}}
    <div class="stats">

        <div class="stat-card">
            <div class="stat-info">
                <span>Total User</span>
                <h2>{{ $totalUsers }}</h2>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <span>Total Produk</span>
                <h2>{{ $totalProducts }}</h2>
            </div>
        </div>

    </div>

    {{-- PRODUCT TABLE --}}
    <div class="dashboard-section">

        <div class="section-header">
            <h2>Daftar Produk</h2>
        </div>

        <div class="table-container">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($products as $product)

                        <tr>
                            <td>{{ $product->ID }}</td>
                            <td>{{ $product->NamaProduk }}</td>
                            <td>{{ $product->Qty }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="empty">
                                Belum ada produk.
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

    {{-- CHART --}}
    <div class="dashboard-section">

        <div class="section-header">
            <h2>Statistik Quantity Produk</h2>
        </div>

        <div class="chart-container">
            <canvas id="productChart"></canvas>
        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const productLabels = @json($products->pluck('NamaProduk'));
    const productQty = @json($products->pluck('Qty'));

    const ctx = document.getElementById('productChart');

    new Chart(ctx, {
        type: 'bar',

        data: {
            labels: productLabels,

            datasets: [{
                label: 'Quantity',

                data: productQty,

                borderWidth: 1
            }]
        },

        options: {
            responsive: true,

            maintainAspectRatio: false,

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endpush