var Property = function ()
{
    var CssCollection = {
        property_list: "property_list"
    };

    var MessageCollection = {

    };

    var drawPropertyItem = function( property_details){
        var property= '<div class="grid-item">\
        <div class="list-image"><img src="'+property_details["image"]+'" class="img-responsive" height="200"></div>\
         <div style="position:absolute; top:10%;"></div><div class="clock-item clock-days countdown-'+property_details['property_id']+' col-sm-6 col-md-3"><div class="wrap"><div class="inner"><div id="canvas-days" class="clock-canvas"></div><div class="text"><p class="val">0</p><p class="type-days type-time">DAYS</p></div></div></div></div><div class="clock-item clock-hours countdown-time-value col-sm-6 col-md-3"><div class="wrap"><div class="inner"><div id="canvas-hours" class="clock-canvas"></div><div class="text"><p class="val">0</p><p class="type-hours type-time">Hrs</p></div></div></div></div><div class="clock-item clock-minutes countdown-time-value col-sm-6 col-md-3"><div class="wrap"><div class="inner"><div id="canvas-minutes" class="clock-canvas"></div><div class="text"><p class="val">0</p><p class="type-minutes type-time">Min</p></div></div></div></div><div class="clock-item clock-seconds countdown-time-value col-sm-6 col-md-3"><div class="wrap"><div class="inner"<div id="canvas-seconds" class="clock-canvas"></div><div class="text"><p class="val">0</p><p class="type-seconds type-time">Sec</p></div></div></div></div></div>\
        <div class="padding-15">\
        <div class="heading">'+property_details["property_title"]+'</div>\
        <p>'+property_details["location"]+'</p>\
        <div class="pricing"> <span class="currency">INR</span> <span class="currency1">'+property_details["bid_price"]+'</span> </div>';
        if( property_details["start_bid"] )
        {
            property+= '<span class="bidnow">Bid</span>';
        }

        property += '<div class="clearfix"></div>\
        </div>\
        </div>';

        return property;
    };

    var drawPropertyItemInRow = function( $property_details_array){
        var property = ''
        for(var i=0; i<$property_details_array.length; i++)
        {
            property += drawPropertyItem($property_details_array[i]);
        }
        return property;
    };

    var loadPropertyList = function() {
        var self = document.getElementsByClassName(CssCollection.property_list)[0];
        var input={
            url: mavrik.property_ajax_url,
            data: {},
            success: function(response) {
                this.mySuccess();
                if(typeof response.error != 'undefined')
                {
                    self.innerHTML = "<h1></h1>"
                }
                else
                {
                    self.innerHTML = drawPropertyItemInRow(response);
                    $('.grid').masonry({
                        itemSelector: '.grid-item',
                        columnWidth: 242,
                        gutter: 15
                    });
                }
            },
            type:'POST',
            ajax_target_element: self
        };
        Common.Ajax(input);
    };

    return {
        init: function() {
            loadPropertyList();
        }
    }
}();
