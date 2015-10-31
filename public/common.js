var Common =
{
    ajax_default_variable: {
        error: function (jqXHR, exception) {
            if (this.ajax_target_element == '') {
                return false;
            }
            $(this.ajax_target_element).data('ajax_var', this);
            if (jqXHR.readyState == 0) {
                Common.showErrorAndGiveRetryOptions(this.ajax_target_element, '', 'common', true);
                return false;
            }
            var ajax_try = parseInt($(this.ajax_target_element).data('ajax_retry'));
            if (ajax_try <= this.max_ajax_retry) {
                ajax_try++;
                $(this.ajax_target_element).data('ajax_retry', ajax_try);
                $.ajax(this);
            }
            else {
                Common.showErrorAndGiveRetryOptions(this.ajax_target_element, '', 'common', false);
            }
        },
        ajax_target_element: '',
        max_ajax_retry: 2,
        beforeSend: function () {
            if (this.ajax_target_element == '') {
                return false;
            }

            var target = Common.showProgress(this.ajax_target_element);

            if( $(this.ajax_target_element).data('ajax_retry') === undefined )
            {
                $(this.ajax_target_element).data('ajax_retry', 0)
            }
        },
        mySuccess: function () {
            $(this.ajax_target_element).removeData('ajax_var');
            $(this.ajax_target_element).removeData('ajax_retry');
            if(this.not_overwrite_container)
            {
                this.ajax_target_element.parentElement.style.position='static';
                this.ajax_target_element.remove();

            }
        },
        not_overwrite_container:false,
        success: function (response) {
            this.mySuccess();
        },
        type: 'GET',
        /* dataType:'json',*/
        cache: false
    },
    Ajax: function (input) {
        if( typeof input.not_overwrite_container != 'udefined')
        {
            $(input.ajax_target_element).css("position", "relative");
            var new_target_element = Common.drawTransparentBlockUI();
            input.ajax_target_element.appendChild(new_target_element);
            input.ajax_target_element = new_target_element;
        }
        $.ajax($.extend(Common.ajax_default_variable, input));
    },
    showProgress: function (targetElement) {
        var message_html = '<div class="common_loading text-center margin-10"><i class="fa fa-spinner fa-pulse fa-5x"></i></div>';

        $(targetElement).html(message_html);

    },
    hideProgress: function (targetElement) {
        $(targetElement).find('.common_loading').remove();
    },

    /* extract keys from given object
     *
     * PARAMS
     *  tempObj - object
     *
     */
    extractKey: function (tempObj) {
        var keyArray = [];
        for (var key in tempObj) {
            if (!tempObj.hasOwnProperty(key)) {
                continue;
            }
            keyArray.push(key);
        }
        return keyArray;
    },

    /* finds the intersection of
     * two arrays in a simple fashion.
     *
     * PARAMS
     *  a - first array, must already be sorted
     *  b - second array, must already be sorted
     *
     */
    intersect_safe: function (a, b) {
        var ai = 0, bi = 0;
        var result = new Array();

        while (ai < a.length && bi < b.length) {
            if (a[ai] < b[bi]) {
                ai++;
            }
            else if (a[ai] > b[bi]) {
                bi++;
            }
            else /* they're equal */
            {
                result.push(a[ai]);
                ai++;
                bi++;
            }
        }

        return result;
    },

    /* remove array element from another array element
     *
     * PARAMS
     *  array_of_items_to_remove - array
     *  array_to_remove_from - array
     *
     */
    remove_from_array: function (array_of_items_to_remove, array_to_remove_from) {
        for (var i = array_to_remove_from.length - 1; i >= 0; i--) {
            for (var j = 0; j < array_of_items_to_remove.length; j++) {
                if (array_to_remove_from[i] === array_of_items_to_remove[j]) {
                    array_to_remove_from.splice(i, 1);
                }
            }
        }
        return array_to_remove_from;
    },

    /*
     * HTMLDecode in Javascript
     *
     * @input  encoded html string
     * @return decoded html
     */
    htmlDecode: function (input) {
        var e = document.createElement('div');
        e.innerHTML = input;
        return e.childNodes[0].nodeValue;
    },

    /*
     * discuss at: http://phpjs.org/functions/is_bool/
     * example 1: is_bool(false);
     * returns 1: true
     *
     * example 2: is_bool(0)
     * returns 2: false
     *
     */
    is_bool: function (mixed_var) {
        return (mixed_var === true || mixed_var === false); // Faster (in FF) than type checking
    },

    setTodayDate: function () {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        return mm + '-' + dd + '-' + yyyy;
    },

    maxElementPerDelimiter: function (string_value, delimiter, max_count, message) {
        string_value = jQuery.trim(string_value);
        var string_value_array = string_value.split(delimiter);
        string_value_array = string_value_array.filter(emptyElement);
        var string_value_array_count = string_value_array.length;
        var status_signal = true;

        if (string_value_array_count > max_count) {
            bootbox.alert(message);
            string_value_array.pop();
            status_signal = false;
        }

        return [status_signal, string_value_array];
    },

    removeDuplicatesElementsInArray: function (arr) {
        var i, j, cur, found;
        for (i = arr.length - 1; i >= 0; i--) {
            cur = arr[i];
            found = false;
            for (j = i - 1; !found && j >= 0; j--) {
                if (cur === arr[j]) {
                    if (i !== j) {
                        arr.splice(i, 1);
                    }
                    found = true;
                }
            }
        }
        return arr;
    },

    strip_protocol_frm_url: function (url) {
        return url.replace(/.*?:\/\//g, "");
    },

    strip_www_frm_url: function (url) {
        url = url.replace("www.", "");
        return url.replace("WWW.", "");
    },
    select2_init_event: function (select2_selector, selected_option) {
        if (typeof selected_option == 'undefined') {
            $(select2_selector).select2('val', '');
        }
        var resetButton = $(select2_selector).parents("form").find("[type=reset]");
        if (resetButton.length > 0) {
            resetButton.click(function () {
                $(select2_selector).select2('val', '');
            });
        }

        $(select2_selector).data("ajax_retry", 0);
        $(select2_selector).on("select2:open", function (e) {
            $(this).data("open", true);
        });

        $(select2_selector).on("select2:close", function (e) {
            $(this).data("open", false);
        });

        /* For validation Check only */
        var attr = select2_selector.attr('data-validation');
        if (typeof attr !== typeof undefined && attr !== false) {
            $(select2_selector).on("change", function () {
                select2_selector.blur();
            });
        }

    },
    select2_themeCallBack: function (themeName, delimiter, mainObj, obj) {
        var objSelector = $("#" + mainObj).find("option[value='" + obj.id + "']").attr('s2');
        if (objSelector) {
            var temp = objSelector.split(delimiter);
        }
        else if (obj.s2Attr) {
            var temp = obj.s2Attr.split(delimiter);
        }
        else {
            return '';
        }
        return Common.placeHolder(temp, themeName);
    },

    placeHolder: function (replaceWithArray, replaceString, startIndex) {
        if (typeof startIndex == 'undefined') {
            startIndex = 1;
        }
        var newString = replaceString;
        var re;
        for (var i = 0; i < replaceWithArray.length; i++) {
            /* Logic for How to replace Placeholder with continuous array element in any string*/
            re = new RegExp("\\{\\{" + startIndex + "\\}\\}", "g");
            newString = newString.replace(re, replaceWithArray[i]);
            startIndex++;
        }
        return newString;
    },
    showHide: function (selector) {
        $(selector).slideToggle('slow');
    },
    addEvent: function addEvent(element, evnt, funct) {
        if (element.attachEvent)
            return element.attachEvent('on' + evnt, funct);
        else
            return element.addEventListener(evnt, funct, false);
    },
    addDatatableEvent: function (anchor_tag, callback) {
        Common.addEvent(
            anchor_tag,
            'click',
            function () {
                callback();
            }
        );
    },
    select2CallBackEvent: function(selector) {
        document.querySelector(".select2-results__options .loading-results").innerHTML = "Searching…";
        if ( $(selector).data("open")) {
            document.querySelector(".select2-search__field").click();
        }
        document.querySelector(".select2-search__field").click();
    },
    addSelect2Event: function (anchor_tag, callback) {
        Common.addEvent(
            anchor_tag,
            'click',
            function () {
                Common.select2CallBackEvent(callback);
            }
        );
    },
    addCommonEvent: function(anchor_tag, callback) {
        Common.addEvent(
            anchor_tag,
            'click',
            function () {
                callback();
            }
        );
    },
    drawTransparentBlockUI: function()
    {
        var div = document.createElement("div");
        div.className = "text-center";
        div.style.background = "rgba(255,255,255, 0.5)";
        div.style.position = "absolute";
        div.style.left = "0";
        div.style.top = "0";
        div.style.width = "100%";
        div.style.height = "100%";
        return div;
    },
    showErrorAndGiveRetryOptions: function (selector, callback, call_from, due_to_internet) {
        var div = document.createElement("div");
        div.className = "text-center margin-top-10";
        div.style.color = "red";

        var i = document.createElement("i");
        i.className = "fa  fa-exclamation-triangle fa-2x";
        div.appendChild(i);

        var span = document.createElement("span");
        if(due_to_internet)
        {
            span.innerHTML = " &nbsp; Whoops! It seems You are Offline. Please Connect to internet.";
        }
        else{
            span.innerHTML = " &nbsp; Whoops! Something Went Wrong :(";
        }

        div.appendChild(span);

        var br = document.createElement("br");
        div.appendChild(br);

        var a = document.createElement("a");
        a.className = "margin-top-20 btn blue btn-xs";
        a.innerHTML = 'Try Again.';
        switch (call_from) {
            case 'datatable':
                Common.addDatatableEvent(a, callback);
                break;
            case 'select2':
                selector = document.querySelector(".select2-results__options .loading-results");
                Common.addSelect2Event(a, callback);
                break;
            case 'common':
                callback = function() {
                    $.ajax( $(selector).data('ajax_var') );
                };
                Common.addCommonEvent(a, callback);
                break;
        }
        div.appendChild(a);

        selector.innerHTML = '';

        selector.appendChild(div);
    },
    select2AjaxErrorHandler: function(jqXHR, selector) {
        selector = $(selector);
        if(jqXHR.readyState == 0)
        {
            Common.showErrorAndGiveRetryOptions('', selector, 'select2', true);
            return false;
        }
        var ajax_try = parseInt( selector.data("ajax_retry") );
        if(ajax_try <= 2)
        {
            ajax_try++;
            selector.data("ajax_retry", ajax_try);
            Common.select2CallBackEvent(selector);
        }
        else
        {
            Common.showErrorAndGiveRetryOptions('', selector, 'select2', false);
        }
    },
    datatableAjaxErrorHandler: function(jqXHR, table_id) {
        var processing_id = (table_id+"_processing");
        var selector = $("#"+table_id);
        var processing_ref = document.getElementById(processing_id);

        if(jqXHR.readyState == 0)
            {
                Common.showErrorAndGiveRetryOptions(processing_ref, function() {
                    processing_ref.innerHTML ="Processing...";
                    MvDataTableCheckbox.redrawTable(table_id);
                }, 'datatable', true );
                return false;
            }
        var ajax_try = parseInt( selector.data("ajax_retry") );
        if(ajax_try <= 2)
        {
            ajax_try++;
            selector.data("ajax_retry", ajax_try);
            MvDataTableCheckbox.redrawTable(table_id);
        }
        else
        {
            Common.showErrorAndGiveRetryOptions(processing_ref, function() {
                processing_ref.innerHTML ="Processing...";
                MvDataTableCheckbox.redrawTable(table_id);
            }, 'datatable', false );
        }
    },
    findAncestor: function  (el, cls) {
        while ((el = el.parentElement) && !el.classList.contains(cls));
        return el;
    },
    findChildren: function  (el, cls) {
        var childs = el.childNodes;
        var child_length = childs.length;
        for(var i=0; i<child_length; i++)
        {
            if(typeof childs[i].classList != 'undefined' && childs[i].classList.contains(cls))
            {
                return childs[i];
                break;
            }
        }
        return false;
    }
};

