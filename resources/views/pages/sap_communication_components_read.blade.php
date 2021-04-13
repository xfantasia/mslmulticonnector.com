
@extends('layouts.base')



@section('title', 'SAP | View Communication Components ')



@section('header_links')
    @parent
@endsection



@section('navbar')
    @include('components/inc_nav_bar_main')
@endsection


@section('alert_messages')
    @parent
@endsection


@section('sidebar')
    @parent
@endsection

 

@section('content')
    @include('components/inc_sap_communication_components_read')
@endsection 



@section('footer')
    @parent
@endsection 



@section('footer_scripts')
    @parent
@endsection  