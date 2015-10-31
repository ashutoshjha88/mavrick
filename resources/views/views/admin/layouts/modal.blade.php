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
    @yield('styles')

    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">

</head>
<body>

<div class="container">
    <div class="page-header">
        &nbsp;
        <div class="pull-right">
            <button class="btn btn-primary btn-xs close_popup">
                <span class="glyphicon glyphicon-backward"></span> {{
						trans('admin/admin.back') }}
            </button>
        </div>
    </div>
    @yield('content')
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('scripts')

</body>
</html>
