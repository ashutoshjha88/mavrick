@extends('app')
@section('title') Property :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Property Page</h2>
        </div>
    </div>
    <div class="property_list">

    </div>
@endsection
@section('script-file')
    <script src="{{ asset('user/property.js') }}"></script>
@endsection
@section('scripts')
    $( document ).ready(function() {
        Property.init();
    });
@endsection