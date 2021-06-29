// Make sure the behaviors still work even after navigating to another page using the ajax navigation.
Event.addBehavior.reassignAfterAjax = true;

/////////////////////////////////////////////////////////////////
// Global behaviours : index (display_variations, destroy_var) //
Event.addBehavior({
  'body' : function() {
    // Update and animate the notice notifier if there is a notice to display
    Notice.view();
  },
  
  'span.restful-destroy form' : Remote.Form({
       method: 'post'
    })
});

/////////////////////////////////////////////////////////////////
// Article page behaviours : 
Event.addBehavior({
  '#categories_link a:click' : function(){
    if($('archives_box').visible()) Effect.toggle('archives_box', 'blind', {duration:.3});
    Effect.toggle('categories_box', 'blind', {duration:.3}); 
    return false;
  },
  
  '#archives_link a:click' : function(){
    if($('categories_box').visible()) Effect.toggle('categories_box', 'blind', {duration:.3});
    Effect.toggle('archives_box', 'blind', {duration:.3}); 
    return false;
  },
  
  'ul.remote_add_tag_link a:click' : function(link){
    Article.insertTag(link); return false;
  },
  
  '#comment_form' : Remote.Form({
     method: 'post',
     onLoading: function(){ $('spinner').show(); },
     onComplete: function(){ $('spinner').hide(); }
  }),
  
  '.destroy_comment' : Remote.Form({
     method: 'post'
  }),
  
  '#show_textile_guide:click' : function(){
    Effect.toggle('textile_guide', 'blind', { duration: 0.3 }); return false;
  },
  
  '#show_feedback_form:click' : function(){
    Effect.toggle('feedback_form', 'blind', { duration: 0.3 }); return false;
  }
});

Event.onReady(function() {
  setupZoom()
});