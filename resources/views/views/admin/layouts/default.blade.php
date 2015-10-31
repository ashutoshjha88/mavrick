@extends('layouts.sidenav')

{{-- Web site Title --}}
@section('title')
    Administration :: @parent
@endsection

{{-- Styles --}}
@section('styles')
    @parent
@endsection

{{-- Sidebar --}}
@section('sidebar')
    @include('admin.partials.nav')
@endsection