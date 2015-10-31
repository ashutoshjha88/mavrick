@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{ $title  }} :: @parent @stop

{{-- Content --}}
@section('main')

    <div class="page-header">
        <h3>
            {{$title}}
        </h3>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-bullhorn fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-list fa-3x"></i>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-list fa-3x"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-camera fa-3x"></i>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-list fa-3x"></i>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-facetime-video fa-3x"></i>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-user fa-3x"></i>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
