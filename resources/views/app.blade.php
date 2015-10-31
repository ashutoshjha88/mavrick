<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @section('title') Laravel 5 Sample Site
        @show
    </title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show
    @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show
    @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/jquery-form-validator/jquery-form-validator.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/smart-forms/css/smart-forms.css') }}" rel="stylesheet">
    @yield('styles')

    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">

</head>
<body>

@include('partials.nav')

<div class="container" style="margin-top:50px !important;">
    @yield('content')
</div>

@include('partials.footer')
@include('partials.footer-for-script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.validate();
    @yield('scripts')
</script>

</body>
</html>
