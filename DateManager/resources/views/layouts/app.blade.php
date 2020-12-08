@extends('layouts.root')

@section('scripts')
    <!-- Custom Theme Scripts -->
    <script defer src="{{asset('assets/dashboard/build/js/custom.min.js')}}"></script>
@endsection

@section('styles')
    <!-- Font Awesome -->
    <link href="{{asset('assets/dashboard/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/dashboard/vendors/nprogress/nprogress')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('assets/dashboard/build/css/custom.min.css')}}" rel="stylesheet">
@endsection

@section('body')
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                @include('partials.aside')
                @include('partials.header')

                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('content')
                </div>

                @include('partials.footer')
            </div>
        </div>
        @include('partials.delete-modal')
    </body>
@endsection
