@extends('adminlte::master')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    <style>
        .nav-pills .nav-link:not(.active):hover {
            color: #395A6A !important;
        }

        table tr td {
            vertical-align: middle!important;
        }
        .bg-img-team     { background-color: #ABB9C0; border-radius: 4px; max-height: 140px; max-width: 140px; }
        .bg-img-team-max { background-color: #ABB9C0; border-radius: 10px; max-height: 400px; max-width: 400px; }
        #icon-team .modal-body,
        #icon-league .modal-body { border-radius: .3rem; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.5); }

        .pagination .page-item .page-link {
            color: #212529 !important;
        }
        .pagination .page-item.active .page-link {
            color: #FFF !important;
            background-color: #5A6268 !important;
            border-color: #5A6268 !important;
        }
        .fixed-table-pagination .pagination-detail .page-list .dropdown-item.active {
            background-color: #5A6268 !important;
        }
        .fixed-table-pagination .pagination-detail .page-list .dropdown-item:active {
            background-color: #7A8186 !important;
        }

        .text-top { color: #F8C300 !important; }
        .text-jng { color: #A652BB !important; }
        .text-mid { color: #0099E1 !important; }
        .text-adc { color: #F93A2F !important; }
        .text-sup { color: #00C09A !important; }
    </style>
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @yield('content_header')
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @yield('content')
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
