@extends('app')
@section('title') Property :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Property Page</h2>
        </div>
    </div>
    <div class="container background-color radius margin-top--30" style="position:relative;">
        <div class="pull-left toggle-view">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn grey active" data-target="list-view"> <i class="fa fa-list"></i>
                    <input type="radio" class="toggle">
                    List</label>
                <label class="btn grey" data-target="map-view"> <i class="fa fa-map-marker"></i>
                    <input type="radio" class="toggle">
                    Map </label>
            </div>
        </div>
        <div class="sort-by"> <span class="active"><a>Price <i class="fa fa-angle-up"></i></a></span> <span><a>Top Rating</a></span> </div>
        <div class="clearfix"></div>
    </div>
    <div class="property_list">
        <div class="container elementShow background-color" id="list-view" style="margin-top:-20px;" >
            <div class="grid-item">
                <div class="list-image"> <img src="../images/main-.jpg" class="img-responsive" height="200">
                <div class="rating">
                    <input class="input-2a" value="3.5" type="number" min=0 max=5 step=0.1 data-size="index" data-show-clear="false" data-show-caption="false" readonly="true" >
                </div>
                <div class="favourite-index"> <i class="icon icon-ea-heart"></i> </div>
            </div>
            </div>
            <div class="padding-15">
                <div class="heading"> Lovely Cottages in a green estate </div>
                <p>Homestay - Private Room <br>
                    in Coorg, Karnataka, India.</p>

                <div class="pricing"> <span class="currency">INR</span> <span class="currency1">12500</span> </div>
                <span class="bidnow">Bid</span>
                <div class="clearfix"></div>
            </div>
        </div>
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