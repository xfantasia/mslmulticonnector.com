<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">

  

<!-- BEGIN: Head-->
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="MSL Multi-Connector Management Application">
        <meta name="keywords" content="MSL Multi-Connector Management Application">
        <meta name="author" content="Microwaresolutions Ltd">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - MSL Multi-Connector Management Application </title>

        <!----- HEADER LINKS ----->
        @section('header_links')
            @yield('header_links')
            @include('components/inc_header_links')
        @show

    </head>






<!-- BEGIN: Body-->
<body class="">



        <!----- NAV BAR ----->
        @section('navbar')
            @yield('navbar')
        @show




        <!----- SIDE BAR ----->
        @section('sidebar')
            @include('components/inc_sidebar')
        @show



         
        <!----- MAIN BODY CONTENT ----->
        <div class="body-content">
            @yield('content')
        </div>




        <!----- FOOTER CONTENT ----->
        <footer class="footer">
            @yield('footer')
            @include('components/inc_footer_content')
         </footer>




        <!----- FOOTER SCRIPTS ----->
        @section('footer_scripts')
            @yield('footer_scripts')
            @include('components/inc_footer_links')
        @show



    </body>

</html>