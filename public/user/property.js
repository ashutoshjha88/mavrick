var Property = function ()
{
    var CssCollection = {
        property_list: "property_list"
    };

    var MessageCollection = {

    };

    var drawPropertyItem = function( property_details){
        var property= '<div class="grid-item">\
        <div class="list-image"> <img src="'+property_details["image"]+'" class="img-responsive" height="200"></div>\
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
