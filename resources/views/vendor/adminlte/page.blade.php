@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@section('title', 'Beyond Creation')
@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @vite('resources/css/app.css')
    @stack('css')
    @yield('css')
@stop
@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())
@section('content_header')
    @include('flash::message')
@endsection
@section('body')
    <div class="wrapper">

        {{-- Preloader Animation --}}
        @if ($layoutHelper->isPreloaderEnabled())
            @include('adminlte::partials.common.preloader')
        @endif

        {{-- Top Navbar --}}
        @if ($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if (!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if (config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @vite('resources/js/app.js')
    @stack('js')
    @yield('js')
@stop
