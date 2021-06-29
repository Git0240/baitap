function postAjax(parameter, request, type, control) {

    jQuery.ajax({
        // the URL for the request
        url: "http://starcityhalongbay.com/Controller/HandlerRequest.ashx",
        // the data to send
        // (will be converted to a query string)
        data: parameter,
        // whether this is a POST or GET request
        type: "POST",
        // the type of data we expect back
        dataType: type || "json",
        async: false,
        // code to run if the request succeeds;
        // the response is passed to the function
        success: function (json) {
            request(json, control);
        },
        beforeSend: function () {
            var load = '<div class="wrapper"><div class="cssload-loader"></div></div>';
            if (control != null || control != undefined) {
                $(control).html(load);
            }
        },
        // code to run if the request fails;
        // the raw request and status codes are
        // passed to the function
        error: function (xhr, status) {
            // code to run regardless of success or failure
            if (control != null || control != undefined) {
                $(control).html('Error...!');
            }

        },
        complete: function (xhr, status) {

        }

    });
};
function postAjax_list(parameter, request, type) {
    jQuery.ajax({
        url: "../Handler_list.ashx",
        data: parameter,
        type: "POST",
        dataType: type || "json",
        async: false,
        success: function (data) {
            //$('.cK-loading.error-box').css('display', 'none');

            data = $.parseJSON(data);
            //$(data).each(function (i) {
            //    var quizlist = data[i];
            //    $('.bl_name').val(quizlist.pname);
            //});

            request(data);

            //return data;
            //alert(json);
        },
        beforeSend: function () {
            // $('.cK-loading.error-box').css('display', 'block');
        },
        error: function (xhr, status) {
        }
    });
};
$(window).bind('load', function () {
    $('img').each(function () {
        if ((typeof this.naturalWidth != "undefined" &&
            this.naturalWidth == 0)
            || this.readyState == 'uninitialized') {
            $(this).attr('src', 'http://' + window.document.location.host + '/Assets/images/no-image.png');
        }
    });
})
var _variable = {
    url: 'http://' + window.location.host,
    html: '',
    html1: '',
    PathImg: '/Assets/HinhAnh/',
    urlImg: 'http://' + window.location.host + '/Assets/HinhAnh/',
    Lang: document.cookie.replace('cookieLang=', ''),
    ListInfo: []
}
var _commons = {
    extendImg: function (w, h) {
        return '.ashx?width=' + w + '&height=' + h + '&mode=crop';
    },
    locdau: function (str) {

        var str;
        if (str != null) {
            str = str.toLowerCase();
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
            str = str.replace(/đ/g, "d");
            str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
            /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
            str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-  
            str = str.replace(/^\-+|\-+$/g, "");
            //cắt bỏ ký tự - ở đầu và cuối chuỗi 
            //eval(obj).value = str.toUpperCase();
        }
        return str;
    },
    numberWithCommas: function (x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".")
    },
    getPathName: function (str, slice) {
        var pos = str.lastIndexOf(slice);
        if (pos == -1) {
            return pos;
        } else {
            return str.slice(pos + 1);
        }
    },
    getPathNameDetail: function (str, slice, slice1) {
        str = str.replace(slice1, '')
        var pos = str.lastIndexOf(slice);
        if (pos == -1) {
            return pos;
        } else {
            return str.slice(pos + 1);
        }
    },
    stringToDate: function (_date, _format, _delimiter, isLocal) {
        if (_date.length > 10) { _date = _date.substr(0, 10); }
        var formatLowerCase = _format.toLowerCase();
        var formatItems = formatLowerCase.split(_delimiter);
        var dateItems = _date.split(_delimiter);
        var monthIndex = formatItems.indexOf("mm");
        var dayIndex = formatItems.indexOf("dd");
        var yearIndex = formatItems.indexOf("yyyy");
        var month = parseInt(dateItems[monthIndex]);
        month -= 1;
        var formatedDate = isLocal ? new Date(dateItems[yearIndex], month, parseInt(dateItems[dayIndex]) + 1).toLocaleDateString() : new Date(dateItems[yearIndex], month, dateItems[dayIndex]);
        return formatedDate;
    },
    createGUID: function () {
        return 'SNDN-4xxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16).toUpperCase();
        });
    },
    createUserGUID: function () {
        return 'xxxx'.replace(/[xy]/g, function (c) {
            var r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x4);
            return v.toString(16).toUpperCase();
        });
    },
    createPassGUID: function () {
        return 'xxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x4);
            return v.toString(16).toUpperCase();
        });
    },
    setCurrentMenu: function (target) {
        //$('.main-menu').find('li').find('a').removeClass('current');
        $('.main-menu').find('li').find('a').each(function () {
            if ($(this).data('id') == target) {
                $(this).addClass('current');
            }
        });
    },
    createCookie: function (name, value, days) {
        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
    },
    readCookie: function (name) {
        var nameEQ = encodeURIComponent(name) + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ')
                c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0)
                return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }
        return null;
    },
    eraseCookie: function (name) {
        this.createCookie(name, "", -1);
    },
    //////////////////////////////////////
    findInfo: function (key) {
        var list = _variable.ListInfo;

        if (list.length > 0) {
            var item = list.find(o => o.IF_ALIAS == key);
            if (item != undefined || item != null || item != "") {
                return item["IF_NAME"];
            } else { return "-"; }
        }

    },
    findInfoDes: function (key) {
        var list = _variable.ListInfo;

        if (list.length > 0) {
            var item = list.find(o => o.IF_ALIAS == key);
            if (item != undefined || item != null || item != "") {
                return item["IF_DES"];
            } else { return "-"; }
        }

    }
}