var Property = function ()
{
    var CssCollection = {
        property_list: "property_list"
    };

    var MessageCollection = {

    };

    var loadPropertyList = function() {
        var self = document.getElementsByClassName(CssCollection.property_list)[0];
        var input={
            url: mavrik.property_ajax_url,
            data: {},
            success: function(response) {
                this.mySuccess();
               console.log(response)
                self.innerHTML = '';
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
