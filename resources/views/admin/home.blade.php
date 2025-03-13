@extends('admin.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container my-5">
        <h2 class="mb-4 text-center">إحصائيات النظام</h2>
        <div class="row">
            <!-- عدد التصنيفات -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">عدد التصنيفات</h5>
                    </div>
                    <div class="card-body text-center">
                        <h3>{{ $categoriesCount }}</h3>
                    </div>
                </div>
            </div>

            <!-- عدد المستخدمين -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">عدد المستخدمين</h5>
                    </div>
                    <div class="card-body text-center">
                        <h3>{{ $usersCount }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- عدد المنتجات -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">عدد المنتجات</h5>
            </div>
            <div class="card-body text-center">
                <h3>{{ $productsCount }}</h3>
                <canvas id="chart-products"></canvas>
            </div>
        </div>
    </div>

    @include('admin.partials.scriptsCharts')

@endsection
