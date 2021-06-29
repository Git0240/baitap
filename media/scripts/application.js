// Place your application-specific JavaScript functions and classes here
// This file is automatically included by javascript_include_tag :defaults

/*-------------------- Global Administration Functions ------------------------------*/
var Global = {

  spinner: function(visible) {
    if (visible)
    $('spinner').visualEffect('appear', {duration: 0.2});
    else
    $('spinner').visualEffect('fade', {duration: 0.2});
  },

  getIDFromEvenmentHrefURL: function(ev, sep) {
    if (sep == null) sep = '=';
    var source_id = Event.element(ev).toString();
    return source_id.substring(source_id.lastIndexOf(sep) + 1, source_id.length);
  },

  getIDFromEvenmentDOMID: function(ev, sep) {
    if (sep == null) sep = '_';
    var source_id = Event.element(ev).id;
    return source_id.substring(source_id.lastIndexOf(sep) + 1, source_id.length);
  },

  setActiveButton: function(button_name) {
    var lis = $$('li.on');
    lis.each (function(li) {
      li.removeClassName('on');
    });
    $(button_name).addClassName('on');
  },
  
  toggleMultipleClass: function(item, classNames) {
    classNames.each (function(className) {
      item.toggleClassName(className);
    });
  },

  scrollToWith2Item: function(item1, item2, choice) {
    if(choice) {
      $(item1).scrollTo();
    } else {
      $(item2).scrollTo();
    }    
  },

  show: function(item, make_visible) {
    if(make_visible) {
      $(item).show();
    } else {
      $(item).hide();
    }    
  },

  showMultiple: function(fields, to_show) {
    fields.each (function(field) {
      Article.show(field, to_show);
    });
  }
};

var Notice = {
  view: function() {
    if($('notice_status') && $('notice_text')){
      var status = $('notice_status').innerHTML;
      var text_to_notice = $('notice_text').innerHTML;
      Notice.set_and_refresh(status, text_to_notice);
    }
  },
  
  set_and_refresh: function(status, text_to_notice) {
    Notice.set(status, text_to_notice);
    Notice.refresh();
  },
  
  set: function(status, text_to_notice) {
    var notice = $('notice');
    var notice_p = $('notice_p');
    notice_p.update(text_to_notice);
    if(status == '1'){
      if(notice.hasClassName('bad')) notice.removeClassName('bad');
      if(!(notice.hasClassName('good'))) notice.addClassName('good');
    }
    else{
      if(notice.hasClassName('good')) notice.removeClassName('good');
      if(!(notice.hasClassName('bad'))) notice.addClassName('bad');
    }
  },
  
  refresh: function() {
    var notice = $('notice');
    Global.show(notice, true);
    Effect.Pulsate(notice, {duration: 2.0, pulses: 2, from: 0.6});
    Effect.Fade(notice, { delay: 2.5, duration: 1.5});
  }

};

var Ticker = {

  pulsate: function(du, pu, fr) {
    if (du == null) du = 3;
    if (pu == null) pu = 2;
    if (fr == null) fr = 0.4;
    $('ticker').visualEffect('pulsate', {duration: du, pulses: pu, from: fr});
  }

};
/*-------------------- Article Administration Functions ------------------------------*/

var Article = {
  article_id: null,
  
  togglePreviewArticleArea: function(div_name, is_textile){
    if (is_textile || $('article_format').options[$('article_format').selectedIndex].value.toLowerCase().valueOf() == "textile")
      $('preview_'+div_name).innerHTML = Article.publishText($(div_name).value);
    else
      $('preview_'+div_name).innerHTML = $(div_name).value;
      
    if($('preview_'+div_name+'_button').innerHTML == 'Preview')
      $('preview_'+div_name+'_button').innerHTML = 'Edit';
    else
      $('preview_'+div_name+'_button').innerHTML = 'Preview';

    Element.toggle(div_name);
    Element.toggle('preview_'+div_name);
    return false;
  },
  
  showHideToolbar: function(){
    var toolbars = $$('.textile-toolbar');
    if ($('article_format').options[$('article_format').selectedIndex].value.toLowerCase().valueOf() == "html"){
      toolbars.each(function(toolbar) {toolbar.hide();});
    }else{
      toolbars.each (function(toolbar) {toolbar.show();});
    }
  },

  publishText: function (str){
    // if(window.RegExp){
      // var regexp = /"([^"\(]+)\s?(?:\(([^\(]*)\))?":(\S+)(\/?)([^[:alnum:]\/;]|[1-9^]*)(\s|$)/g;
      //str = document.getElementById("post").value;

      var regexp = /"([^"\(]+)\s?(?:\(([^\(]*)\))?":(\S+)(\/?)([^[:alnum:]\/;]|[1-9^]*)(\s|$)/g;
      var newstr = str.replace(regexp, '<a href="$3$4" title="Link to: $1" rel="external">$1</a> '); 

      var regexp2 = /\_(.+?)\_ */g;
      var newstr2 = newstr.replace(regexp2, "<em>$1</em> ");

      var regexp3 = /\*(.+?)\* */g;
      var newstr3 = newstr2.replace(regexp3, "<strong>$1</strong> ");

      var regexp4 = /^\s+|\s+$/g;
      var newstr4 = newstr3.replace(regexp4, '');

      var regexp5 = /\n?(.+?)(?:\n\s*\n|\\z)/g;
      // var regexp5 = /\n?(.+?)(?:\n\s*\n)/g;
      var newstr5 = newstr4.replace(regexp5, '<p>$1</p>');

      var regexp6 = /(\r|\n)/g;
      var newstr6 = newstr5.replace(regexp6, "<br />");

      var regexp7 = /\[\[([[\S][^[]*)\]\[([[\S][^[]*)\]\]/g;
      var newstr7= newstr6.replace(regexp7, "<br /><img src=\"/www/medias/$2/$1\" /><br />");

      var regexp8 = /\[\[(http[\S\.\/:][^[]*)\]\[(\d*)\]\[(\d*)\]\]/g;
      var newstr8 = newstr7.replace(regexp8, "<br /><object width=\"$2\" height=\"$3\"><param name=\"movie\" value=\"$1\"></param><param name=\"wmode\" value=\"transparent\"></param><embed src=\"$1\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"$2\" height=\"$3\"></embed></object><br />");

      var regexp9 = /\_(.+?)\_ */g;
      var newstr9 = newstr8.replace(regexp9, "<em>$1</em> ");

      var regexp10 = /src="(.*)(<em>|<\/em> *)/g;
      var newstr10 = newstr9.replace(regexp10, 'src="$1_');

      var regexp11 = /src="(.*)(<em>)/g;
      var newstr11 = newstr10.replace(regexp11, 'src="$1_');

      return newstr11;
    // }
  },

  previewTextilizedText: function() {
    $('article_body').value = Article.preview_textilized_text;
  },
  
  insertTag: function(link) {
    tag_without_quotes = link.target.innerHTML.strip().gsub(',','');
    
    if(tag_without_quotes.include(' '))
      final_tag = "\""+tag_without_quotes+"\"";
    else
      final_tag = tag_without_quotes;
    
    $('article_tag_list').value += " " + final_tag;
  },

  insertVideo: function(link) {
    video = $('video_select').options[$('video_select').selectedIndex].value;
    
    // if($('article_format').options[$('article_format').selectedIndex].value == 'textile'){
    $('article_body').value +=  "\nvideo_start" +
                                "\nvideo_allowfullscreen:true" +
                                "\nvideo_width:480" +
                                "\nvideo_height:270" +
                                "\nvideo_file:|" + video + "|" +
                                "\nvideo_image:|http://site.com/your_image.jpg|" +
                                "\nvideo_end";
  },
  
  setFeaturedImage: function() {
    var feats = $$('span.featured');
    feats.each (function(feat){
      Effect.Fade(feat, { delay: 0.0, duration: 1.0});
    });

    if (!$('images_ul')) return;
    var feat_span = Builder.node('span', {className: 'featured'});
    var first = $('images_ul').firstChild;

    feat_span.hide();
    first.appendChild(feat_span);
    Effect.Appear(feat_span, { delay: 0.3, duration: 1.0});
  },
  
  showBox: function(box) {
      LightBoxStyle.start(box);
      return false;
  },

  hideBox: function(box) {
      LightBoxStyle.end(box);
      return false;
  }
};

/**
* PreviewBox display an article preview box, in the admin
**/
PreviewBox = Class.create();
PreviewBox.prototype = {
	controller: null,

 	initialize: function(div) {
		this.div = div;

		if ($(this.div)) {
			this.createPopup();
			this.setDefaults();
      this.setItemAttributes(this, this.div, 0);
		}
	},

 	createPopup: function() {
		this.closeBtn = Builder.node('a', {href:'#close', 'class':'close'}, 'Close');
		Event.observe(this.closeBtn, 'click', this.close.bindAsEventListener(this), false);
		
		this.popup = Builder.node('div', {'id':'preview_box', 'class':'preview_box'}, [
			this.closeBtn,
			$(this.div)
		]);
		
 		document.body.appendChild(this.popup);
 	},

 	setDefaults: function() {
		this.defaultWidth = this.popup.offsetWidth;
		this.padleft = parseInt(Element.getStyle(this.popup, 'marginLeft').replace(/px/i,''));
		this.padright = parseInt(Element.getStyle(this.popup, 'marginRight').replace(/px/i,''));

		this.defaultHeight = this.popup.offsetHeight;
		this.padtop = parseInt(Element.getStyle(this.popup, 'marginTop').replace(/px/,''));
		this.padbottom = parseInt(Element.getStyle(this.popup, 'marginBottom').replace(/px/,''));
 	},

  setItemAttributes: function(evt, item, i) {
 		// store the small size and position for later
		this.left = evt.pageX || evt.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
		this.left -= this.width/2;
		this.left = this.left || document.body.getDimensions().width / 2;
		this.width = (item.offsetWidth>80) ? 80 : item.offsetWidth;
		this.height = item.offsetHeight;
		this.top = evt.pageY || evt.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
		this.top -= this.height/2;
		
		// stop the default event
    // Event.stop(evt);

		// prepare the preview
    this.prepPop(evt, item, i);
 	},

	windowSize: function() {
		var width = window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth);
		var height = window.innerHeight || (window.document.documentElement.clientHeight || window.document.body.clientHeight);
		var x = window.pageXOffset || (window.document.documentElement.scrollLeft || window.document.body.scrollLeft);
		var y = window.pageYOffset || (window.document.documentElement.scrollTop || window.document.body.scrollTop);

		return {'width':width, 'height':height, 'x':x, 'y':y}
	},

 	setPopPosition: function() {
		// set the position/offset of the image
		var left, top = null;

		left = this.windowSize().x+(this.windowSize().width-this.defaultWidth-this.padleft-this.padright)/2;
		if (this.windowSize().width<this.defaultWidth+this.padleft+this.padright) left = this.windowSize().x-(this.padtop-this.closeBtn.offsetWidth);

		top = this.windowSize().y+(this.windowSize().height-this.defaultHeight-this.padtop-this.padbottom)/2;
		if (this.windowSize().height<this.defaultHeight+this.padtop+this.padbottom) top = this.windowSize().y-(this.padtop-this.closeBtn.offsetHeight);
		
		return { left:left, top:top };
 	},

 	prepPop: function(evt, item, i) {
		// call the effect
		this.pop(this.defaultWidth, this.setPopPosition().top, this.defaultHeight, this.setPopPosition().left, item, i);
	},

 	beforePop: function() {
 	},

 	pop: function(width, top, height, left, item, i) {
		// prep the popup/shadow for the effect
		this.popup.style.width = this.width+'px';
		this.popup.style.height = this.height+'px';
		this.popup.style.left = this.left+'px';
		this.popup.style.top = this.top+'px';

		Element.setOpacity(this.popup, 0);
			new Effect.Parallel([
					new Effect.MoveBy(this.popup, top-this.top, left-this.left, { sync:true, transition:Effect.Transitions.flicker }), 
          // new Effect.Scale(this.popup, (width/this.width)*100, { sync:true, scaleY:false, scaleContent:false }),
          // new Effect.Scale(this.popup, (height/this.height)*100, { sync:true, scaleX:false, scaleContent:false }),
					new Effect.Appear(this.popup, { sync:true }),          
          new Effect.Appear(this.div, { sync:true })
				],
				{ duration:.3, beforeStart:this.beforePop.bind(this), afterFinish:this.afterPop.bind(this, item, i) }
			);
	},

 	afterPop: function(item, i) {
		this.popup.style.width = '';
		this.popup.style.height = '';
		Element.setOpacity(this.popup, '');
 	},

 	beforeClose: function() {
 	},

 	close: function(evt) {
 		if (evt) Event.stop(evt);

		var width = this.defaultWidth;
		var left = this.popup.offsetLeft;
		var height = this.defaultHeight;
		var top = this.popup.offsetTop;

			// do the craziness
			new Effect.Parallel([
        // new Effect.MoveBy(this.popup, this.top-top, this.left-left, { sync:true, transition:Effect.Transitions.flicker }), 
        // new Effect.Scale(this.popup, (this.width/width)*100, { sync:true, scaleY:false, scaleContent:false }),
        // new Effect.Scale(this.popup, (this.height/height)*100, { sync:true,scaleX:false, scaleContent:false }),
				new Effect.Fade(this.popup, { sync:true }),
				new Effect.Fade(this.div, { sync:true })
			],
			{ duration:.3, beforeStart:this.beforeClose.bind(this), afterFinish:this.afterClose.bind(this) });
	},

 	afterClose: function() {
		// reset everything
		this.popup.style.width = '';
		this.popup.style.height = '';
		this.popup.style.left = '';
		this.popup.style.top = '';
		this.popup.style.display = '';
 	},

 	fixSafarisScrollBars: function() {
		scrollTo = 1;
		window.scroll(this.windowSize().x+scrollTo, this.windowSize().y+scrollTo);
		scrollTo = -scrollTo;
		window.scroll(this.windowSize().x+scrollTo, this.windowSize().y+scrollTo);
 	}
}