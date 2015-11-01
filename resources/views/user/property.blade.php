@extends('app')
@section('title') Property :: @parent @stop
@section('styles')
    <style>

        .text {
            color: #000;
            font-size: 12px;
            position: absolute;
            top: 20%;
            right:0%;
            text-align: center;
            width: 100%;
        }

    </style>
    @endsection
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Property Page</h2>
        </div>
    </div>
    <div>
        <div class="container elementShow background-color" id="list-view" style="margin-top:-20px;" >
            <div class="grid property_list">

            </div>
        </div>
    </div>

@endsection
@section('script-file')
    <script src="{{ asset('user/property.js') }}"></script>
    <script src="{{ asset('plugins/final-countdown/kinetic.js') }}"></script>
    <script src="{{ asset('plugins/final-countdown/jquery.final-countdown.js') }}"></script>
@endsection
@section('scripts')
    $( document ).ready(function() {
        Property.init();
        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: 242,
            gutter: 15
        });

    });
@endsection