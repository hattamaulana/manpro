@extends('layouts.app', [
'title' => $title ?? ''
])

@section('content')
    <div class="section-header">
        <h1> {{ $title ?? '' }} </h1>
    </div>
    <div class="section-body">
        @yield('body')
    </div>
@endsection

@section('customJS')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                autoWidth: true,
                responsive: true,
                scrollCollapse: true,
                scroller:       true
            });

            $('.select2').select2();
        });
    </script>

    @yield('assetJs')
    @yield('js')
@endsection

@section('customCSS')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.css" />
    @yield('assetCss')
    @yield('css')
@endsection
