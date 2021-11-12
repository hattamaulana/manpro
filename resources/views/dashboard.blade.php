@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url();">
                    <div class="hero-inner">
                        <h2>Selamat datang, {{ Auth::user()->username }}</h2>
                        <p class="lead">Bagaimana kabar hari ini ?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
    </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('public/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('public/node_modules/jqvmap/dist/maps/jquery.vmap.indonesia.js') }}"></script>
    <script src="{{ asset('public/assets/js/page/components-statistic.js') }}"></script>

    <script>
        var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: JSON.parse('{!! $label !!}'),
                datasets: JSON.parse('{!! $dataset !!}')
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 200
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script>
@endsection
