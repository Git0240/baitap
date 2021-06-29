var lang = document.cookie.replace('cookieLang=', '').substr(0, 5);
function RoomsItem(id, img, name, price, area, des, delay, link) {
    var htm = '<li class="property-boxes col-xs-6 col-md-4" data-animation="fadeInLeft" data-animation-delay=".' + delay + '">'
        + '<div class="prp-img">'
        + '    <img src="' + img + '" alt="' + name + '">'
        + '    <div class="price">'
        + '         <span>' + _commons.numberWithCommas(price) + '$</span>'
        + '      </div>'
        + '   </div>'
        + '  <div class="prp-detail">'
        + '       <div class="title">' + name + '</div>'
        + '       <div class="title title_des">' + (lang == 'vi-VN' ? 'Diện tích: ' : 'Area: ')+ area + 'm2</div>'
        + '       <div class="description">' + des + '</div>'
        + '       <a href="javascript:booking(' + id + ')" class="more-detail booking btn colored">' + (lang == 'vi-VN' ? 'Đặt Phòng' : 'Booking')
        + '        </a>'
        + '       <a href="' + link + '" class="more-detail btn colored">' + (lang == 'vi-VN' ? 'Chi Tiết' : 'Detail')
        + '        </a>'
        + '    </div>'
        + '</li>';
    return htm;
}
function ServicesItems(id, name, img, des, link, lang, active) {
    var htm = '<div class="tab-pane fade in ' + (active ? 'active' : '') + '" id="event-' + id + '">'
        + ' <div class="event-boxes">'
        + '   <div class="event-box clearfix">'
        + '      <div class="event-pic col-xs-4 col-md-3">'
        + '          <img src="' + img + '" alt="' + name + '">'
        + '      </div>'
        + '       <div class="event-right col-xs-8 col-md-9">'
        + '           <div class="name">' + name + '</div>'
        + '           <div class="date">---</div>'
        + '          <div class="description">' + des + '</div>'
        + '          <a href="' + link + '" class="book-now btn btn-sm colored">' + (lang == 'vi-VN' ? 'Chi Tiết' : 'Detail') + '</a>'
        + '       </div>'
        + '    </div>'
        + '</div>'
        + '</div>';

    return htm;
}
function SericesItemsHead(id, name, img, delay, active) {
    var htm = '<li data-animation="flipInY" data-animation-delay=".' + delay + '" class="' + (active ? 'active' : '') + '">'
        + '     <a href="#event-' + id + '" data-toggle="tab">'
        + '         <span class="number">'
        + '             <img src="' + img + '" alt="' + name + '"></span>'
        + '         <span class="title">' + name + '</span>'
        + '     </a>'
        + ' </li>';
    return htm;
}
function PartnerItem(name, img, des) {
    var htm = '<div class="item">'
        + ' <div class="client-pic">'
        + '     <img src="' + img + '" alt="' + name + '">'
        + ' </div>'
        + ' <cite>' + name + '</cite>'
        + '<blockquote>' + des + '</blockquote>'
        + '</div>';
    return htm;
}