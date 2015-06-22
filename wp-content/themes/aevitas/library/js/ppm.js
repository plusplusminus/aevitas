jQuery(window).load(function(){
  cbpBGSlideshow.init()
});

jQuery(document).ready(function(){
  jQuery(".wp-caption").removeAttr('style');

  initForm();



  var docElem = document.documentElement,
    header = document.querySelector( '.header' ),
    didScroll = false,
    changeHeaderOn = 300;

  function init() {
    window.addEventListener( 'scroll', function( event ) {
      if( !didScroll ) {
        didScroll = true;
        setTimeout( scrollPage, 250 );
      }
    }, false );
  }

  function scrollPage() {
    var sy = scrollY();
    if ( sy >= changeHeaderOn ) {
      classie.add( header, 'css-header-shrink' );
    }
    else {
      classie.remove( header, 'css-header-shrink' );
    }
    didScroll = false;
  }

  function scrollY() {
    return window.pageYOffset || docElem.scrollTop;
  }

  init();

  jQuery('.post_video').fitVids();

  jQuery('.aev-icon-search').on('click',function(e){
    e.preventDefault();
    jQuery('.aev-search').toggleClass('aev-search-open');
    jQuery('#searchform input:first').focus();

  })

  jQuery('#searchform').submit(function(){
    if ( jQuery( "#searchform input:first" ).val() === "" ) {
      jQuery('.aev-search').toggleClass('aev-search-open');
      event.preventDefault();
    }
  })

  $fancybox = jQuery(".fancybox").fancybox({
    fsBtn:true,
    openEffect  : 'none',
    closeEffect : 'none',
    'nextEffect': 'fade',
    'prevEffect': 'fade',
    padding: 0,
    margin:10,
    closeBtn : true,
    helpers : {
      title: {
          type: 'outside'
      },
    },
    beforeShow: function () {
      
      var alt = ''

      if (this.element.data('title'))
      {
        alt = this.element.data('title');
      }
      
      this.inner.find('img').attr('alt', alt);
      
      this.title = '<span class="fancy_title">'+alt+'</span>';
      var title = alt;
       // Add tweet button
      this.title += '<ul class="fancy_social list-inline"><li><a target="blank" href="https://twitter.com/intent/tweet?text='+title+'&url='+this.href+'" class="twitter-share-button"><span class="fa fa-twitter"></span></a></li>';
      this.title += '<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='+this.href+'" class="facebook-share-button"><span class="fa fa-facebook"></span></a></li>';
      this.title += '<li><a target="_blank" href="http://www.pinterest.com/pin/create/button/?url={{url}}&media='+this.href+'" class="pinterest-share-button"><span class="fa fa-pinterest"></span></a></li>';
      this.title += '<li><a target="_download" href="#" class="js-expand"><span class="fa fa-expand"></span></a></li>';

      this.title += '<li><a class="js-prev" title="Previous" href="javascript:;"><span class="fa fa-angle-left"></span></a></li><li><a class="js-play" title="Start slideshow" href="javascript:;"><span class="fa fa-play"></span></a></li><li><a class="js-next" title="Next" href="javascript:;"><span class="fa fa-angle-right"></span></a></li><li><a class="js-close" title="Close" href="javascript:;"><span class="fa fa-times"></span></a></li></ul>';

      
    },
    afterLoad  : function () {
        jQuery.extend(this, {
            aspectRatio : false,
            type    : 'html',
            width   : '100%',
            height  : '100%',
            content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: contain; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
        });
    },
    beforeClose :function() {
      jQuery('body').removeClass('slideshow-start');
    },
    tpl : {
      closeBtn : '<a title="Close" class="fancybox-item fancybox-close btn btn-sm btn-default" href="javascript:;"><span class="fa fa-times"></span></a>',
      next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span class="fa fa-angle-right"></span></a>',
      prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span class="fa fa-angle-left"></span></a>'
    }
  });

  jQuery(document).on('click','.js-prev',function(e){
    e.preventDefault();
    jQuery.fancybox.prev()

  })

  jQuery(document).on('click','.js-next',function(e){
    e.preventDefault()
    jQuery.fancybox.next()
    
  })

  jQuery(document).on('click','.js-play',function(e){
    e.preventDefault()
    jQuery( 'body' ).toggleClass( "slideshow-start" );
    jQuery.fancybox.play()
    
  })

  jQuery(document).on('click','.js-close',function(e){
    e.preventDefault()
    jQuery('body').removeClass('slideshow-start');
    jQuery.fancybox.close()
    
  })


  var ias = jQuery.ias({
    container:  '.js-infinite-cont',
    item:       '.js-infinite',
    pagination: '.wp-prev-next',
    next:       '.prev-link > a'
  });

  var owl = jQuery(".owl-slider");
 
  owl.owlCarousel({
    navigation : true, // Show next and prev buttons
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    pagination: false,
    transitionStyle : "fade",
    lazyLoad: false,
    afterInit: function() {
      height = window.innerHeight;
      width = window.innerWidth;

      if (width > 991) {
        jQuery( '.home-slider .owl-item' ).css('height',height);
      }
    },
    navigationText:["<span class='fa fa-angle-left'></span>","<span class='fa fa-angle-right'></span>"],
    afterMove: function (elem) {
      var current = this.currentItem;
      var src = elem.find(".owl-item").eq(current).find("img").attr('src');
      
    }
  });

  jQuery(document).on('click','.js-expand',function(e) {
    e.preventDefault();
    jQuery(document).toggleFullScreen();
  });
 
  // Custom Navigation Events
  jQuery(".js-next").click(function(){
    owl.trigger('owl.next');
  })

  jQuery(".js-prev").click(function(){
    owl.trigger('owl.prev');
  })

  jQuery(".js-play").click(function(){
    owl.trigger('owl.play',3000); //owl.play event accept autoPlay speed as second parameter
  })

  jQuery(".js-stop").click(function(){
    owl.trigger('owl.stop');
  })

  jQuery('.owl-item img').on('load',function(e) {
    e.preventDefault();
    jQuery(this).css('opacity',1);
  });

  // Add a text when there are no more pages left to load
  ias.extension(new IASPagingExtension());
  ias.extension(new IASHistoryExtension({ prev: '.prev a' }));
  ias.extension(new IASTriggerExtension({ html: '<div class="clearfix"></div><div class="ias-trigger ias-trigger-next" style="text-align: center; cursor: pointer;"><button class="grid_footer--btn footer--btn">Load More <span class="icon icon-angle-down"></span></button></div>'}));


  jQuery('.slider').slick({
    dots: false,
    arrows: true,
    adaptiveHeight: true,
    slidesToShow: 1,
    lazyLoad: 'progressive'
  });

  jQuery('.js-slider-testimonials').slick({
    dots: false,
    arrows: true,
  });

  

  jQuery('.js-gallery-init').on('click',function(e){

    e.preventDefault();
    var id = jQuery(this).data('id');
    var galleryItems = jQuery('meta[name="gallery-'+id+'"]').attr("content"); 
    var obj = JSON.parse(galleryItems);
    var pswpElement = document.querySelectorAll('.pswp')[0];


  // define options (if needed)
  var options = {
      // optionName: 'option value'
      // for example:
      index: 0, // start at first slide,
      showAnimationDuration: 300,
      showHideOpacity: true
  };

    // initialise as usual
  var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, obj, options);

  // create variable that will store real size of viewport
  var realViewportWidth,
      useLargeImages = false,
      firstResize = true,
      imageSrcWillChange;

  // beforeResize event fires each time size of gallery viewport updates
  gallery.listen('beforeResize', function() {
      // gallery.viewportSize.x - width of PhotoSwipe viewport
      // gallery.viewportSize.y - height of PhotoSwipe viewport
      // window.devicePixelRatio - ratio between physical pixels and device independent pixels (Number)
      //                          1 (regular display), 2 (@2x, retina) ...


      // calculate real pixels when size changes
      realViewportWidth = gallery.viewportSize.x * window.devicePixelRatio;

      // Code below is needed if you want image to switch dynamically on window.resize

      // Find out if current images need to be changed
      if(useLargeImages && realViewportWidth < 1000) {
          useLargeImages = false;
          imageSrcWillChange = true;
      } else if(!useLargeImages && realViewportWidth >= 1000) {
          useLargeImages = true;
          imageSrcWillChange = true;
      }

      // Invalidate items only when source is changed and when it's not the first update
      if(imageSrcWillChange && !firstResize) {
          // invalidateCurrItems sets a flag on slides that are in DOM,
          // which will force update of content (image) on window.resize.
          gallery.invalidateCurrItems();
      }

      if(firstResize) {
          firstResize = false;
      }

      imageSrcWillChange = false;

  });


  // gettingData event fires each time PhotoSwipe retrieves image source & size
  gallery.listen('gettingData', function(index, item) {

      // Set image source & size based on real viewport width
      if( useLargeImages ) {
          item.src = item.originalImage.src;
          item.w = item.originalImage.w;
          item.h = item.originalImage.h;
      } else {
          item.src = item.mediumImage.src;
          item.w = item.mediumImage.w;
          item.h = item.mediumImage.h;
      }

      // It doesn't really matter what will you do here, 
      // as long as item.src, item.w and item.h have valid values.
      // 
      // Just avoid http requests in this listener, as it fires quite often

  });


  // Note that init() method is called after gettingData event is bound
  gallery.init();

  })

  // init Isotope
  var $container = jQuery('.panel-group').isotope({layoutMode: 'vertical'});

  // filter items on button click
  jQuery('#filters').on( 'click', 'a', function(e) {
    e.preventDefault();
    var filterValue = jQuery(this).attr('data-filter');
    $container.isotope({ filter: filterValue });

  });

});



var cbpBGSlideshow = (function() {

  var $slideshow = jQuery( '.home-slider' ),
    $items = jQuery( '.home-slider' ).find( '.item_gallery' ),
    itemsCount = $items.length;

  function init( config ) {

    // preload the images
    $slideshow.imagesLoaded( function() {


      if( Modernizr.backgroundsize ) {
        $items.each( function() {
          var $item = jQuery( this );
          $item.css( 'background-image', 'url(' + $item.find( 'img' ).attr( 'src' ) + ')' );
          $item.css( 'background-position', $item.data( 'x' ) + ' ' + $item.data( 'y' ));
          $item.removeClass('loader');

        } );
      }
      else {
        $slideshow.find( 'img' ).show();
        // for older browsers add fallback here (image size and centering)
      }
    } );
    
  }

  function reinit( config ) {

    // preload the images
    $slideshow.imagesLoaded( function() {
      
      height = window.innerHeight;
      width = window.innerWidth;

      if (width > 991) {
        var $itemP = jQuery( '.home-slider .owl-item' ).css('height',height);
      } else {
        var $itemP = jQuery( '.home-slider .owl-item' ).css('height','auto');
      }
      
    } );
  }
    

  return { init : init,reinit: reinit };

})();

function initHeader() {
  height = window.innerHeight;
  width = window.innerWidth;

  if (width > 991) {
    jQuery( '.home-slider .owl-item' ).css('height',height);
  }
}

window.addEventListener('resize', resize);

function resize() {
  cbpBGSlideshow.reinit();
}


var facets = [];

// A selectizer module to contain all reusable functions
var Selectizer = function () {
  return {
    loadOptions: function (query, callback) {
      // Save this into a variable. Need to use this inside the Ajax block
      var selectize = this;

      // The Ajax call
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          action: "get_selectize_options",
          tax: this.settings.tax
        },
        error: function() {
          callback();
        },
        success: function(data) {
          //callback(data.opts);
          jQuery.each(data.optgroups, function(index, value) {
            selectize.addOptionGroup(value['value'], { text: value['text'] });
          });

          selectize.refreshOptions();
          callback(data.opts);



        }
      });
    },

    deleteOption: function(value) {
      var selectize = this;

      _.remove(facets, function(n) {
        console.log(n.tax);
        return n.tax == selectize.settings.tax;
      });

      jQuery('.submit_button').attr('disabled','disabled').text('Loading');
      
      console.log(facets);

      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data : {action: "get_faceted_search",facets:facets},
        success: function(response) { 
          var html = '';

          if (response.data.location) {
            $location[0].selectize.enable();
            var loc = $location[0].selectize.getValue();
            $location[0].selectize.clearOptions();
            $location[0].selectize.addOption(response.data.location);
            $location[0].selectize.setValue(loc,true);
            $location[0].selectize.refreshOptions(false);
          } else {
            $location[0].selectize.disable();
          }

          if (response.data.style) {         
            $style[0].selectize.enable();
            var style = $style[0].selectize.getValue();
            $style[0].selectize.clearOptions();
            $style[0].selectize.addOption(response.data.style);
            $style[0].selectize.setValue(style,true);
            $style[0].selectize.refreshOptions(false);
          } else {
            $style[0].selectize.disable();
          }

          if (response.data.venue) {
            $venue[0].selectize.enable();
            var venue = $venue[0].selectize.getValue();
            $venue[0].selectize.clearOptions();
            $venue[0].selectize.addOption(response.data.venue);
            $venue[0].selectize.setValue(venue,true);
            $venue[0].selectize.refreshOptions(false);
          } else {
            $venue[0].selectize.disable();
          }

          if (response.data.type) {
            $type[0].selectize.enable();
            var type = $type[0].selectize.getValue();
            $type[0].selectize.clearOptions();
            $type[0].selectize.addOption(response.data.type);
            $type[0].selectize.setValue(type,true);
            $type[0].selectize.refreshOptions(false);
          } else {
            $type[0].selectize.disable();
          }

          if (response.data.culture) {

            $culture[0].selectize.enable();
            var culture = $culture[0].selectize.getValue();
            $culture[0].selectize.clearOptions();
            $culture[0].selectize.addOption(response.data.culture);
            $culture[0].selectize.setValue(culture,true);
            $culture[0].selectize.refreshOptions(false);
          } else {
            $culture[0].selectize.disable();
          }

          if (response.data.setting) {
            $setting[0].selectize.enable();
            var setting = $setting[0].selectize.getValue();
            $setting[0].selectize.clearOptions();
            $setting[0].selectize.addOption(response.data.setting);
            $setting[0].selectize.setValue(setting,true);
            $setting[0].selectize.refreshOptions(false);
          } else {
            $setting[0].selectize.disable();
          }

          
          jQuery('.submit_button').removeAttr("disabled").text('Filter');

        }
      })


    },

    changeOptions: function(value) {

      if (value != "") {

      var selectize = this;

      jQuery('.submit_button').attr('disabled','disabled').text('Loading');
      
      facets.push({tax:selectize.settings.tax,id:value});
      
      console.log(facets);

      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data : {action: "get_faceted_search",facets:facets},
        success: function(response) { 
          var html = '';

          if (response.data.location) {
            var loc = $location[0].selectize.getValue();

            $location[0].selectize.clearOptions();
            $location[0].selectize.addOption(response.data.location);
            $location[0].selectize.setValue(loc,true);
          } else {
            $location[0].selectize.disable();
          }

          if (response.data.style) {         
            var style = $style[0].selectize.getValue();
            $style[0].selectize.clearOptions();
            $style[0].selectize.addOption(response.data.style);
            $style[0].selectize.setValue(style,true);
          } else {
            $style[0].selectize.disable();
          }

          if (response.data.venue) {
            var venue = $venue[0].selectize.getValue();
            $venue[0].selectize.clearOptions();
            $venue[0].selectize.addOption(response.data.venue);
            $venue[0].selectize.setValue(venue,true);
          } else {
            $venue[0].selectize.disable();
          }

          if (response.data.type) {
            var type = $type[0].selectize.getValue();
            $type[0].selectize.clearOptions();
            $type[0].selectize.addOption(response.data.type);
            $type[0].selectize.setValue(type,true);
          } else {
            $type[0].selectize.disable();
          }

          if (response.data.culture) {

            var culture = $culture[0].selectize.getValue();
            $culture[0].selectize.clearOptions();
            $culture[0].selectize.addOption(response.data.culture);
            $culture[0].selectize.setValue(culture,true);
          } else {
            $culture[0].selectize.disable();
          }

          if (response.data.setting) {
            var setting = $setting[0].selectize.getValue();
            $setting[0].selectize.clearOptions();
            $setting[0].selectize.addOption(response.data.setting);
            $setting[0].selectize.setValue(setting,true);
          } else {
            $setting[0].selectize.disable();
          }

          
          jQuery('.submit_button').removeAttr("disabled").text('Filter');

        }
      })
    } else {
      return;
    } 

    },

  };
}();


// The function that runs at form initialization
var initForm = function () {

  // Selectize
  $location = jQuery('#location-select').selectize({
      plugins: ['remove_button'],
      create: false,
      optgroupField: 'class',
      labelField: 'text',
      searchField: ['text'],
      tax:'location',
      // Render
      //render: { option: Selectizer.renderOptions },

      render: {
        optgroup_header: function(data, escape) {
          return '<div class="optgroup-header">' + escape(data.text) + '</div>';
        }
      },

      initItem: true,

      // Need to preload, so that Selectize will go get the option
      preload: true,

      // Load
      load: Selectizer.loadOptions,

      onChange: Selectizer.changeOptions,

      onDelete: Selectizer.deleteOption
  });

  $type = jQuery('#type-select').selectize({
      plugins: ['remove_button'],
      create: false,
      optgroupField: 'class',
      labelField: 'text',
      searchField: ['text'],
      tax: 'type',
      // Render
      //render: { option: Selectizer.renderOptions },

      render: {
        optgroup_header: function(data, escape) {
          return '<div class="optgroup-header">' + escape(data.text) + '</div>';
        }
      },

      initItem: true,

      // Need to preload, so that Selectize will go get the option
      preload: true,

      // Load
      load: Selectizer.loadOptions,

      onChange: Selectizer.changeOptions,

      onDelete: Selectizer.deleteOption
  });

  $setting = jQuery('#setting-select').selectize({
      plugins: ['remove_button'],
      create: false,
      optgroupField: 'class',
      labelField: 'text',
      searchField: ['text'],
      tax: 'setting',
      // Render
      //render: { option: Selectizer.renderOptions },

      render: {
        optgroup_header: function(data, escape) {
          return '<div class="optgroup-header">' + escape(data.text) + '</div>';
        }
      },

      initItem: true,

      // Need to preload, so that Selectize will go get the option
      preload: true,

      // Load
      load: Selectizer.loadOptions,

      onChange: Selectizer.changeOptions,

      onDelete: Selectizer.deleteOption
  });

  $venue = jQuery('#venue-select').selectize({
      plugins: ['remove_button'],
      create: false,
      optgroupField: 'class',
      labelField: 'text',
      searchField: ['text'],
      tax: 'venue',
      // Render
      //render: { option: Selectizer.renderOptions },

      render: {
        optgroup_header: function(data, escape) {
          return '<div class="optgroup-header">' + escape(data.text) + '</div>';
        }
      },

      initItem: true,

      // Need to preload, so that Selectize will go get the option
      preload: true,

      // Load
      load: Selectizer.loadOptions,

      onChange: Selectizer.changeOptions,

      onDelete: Selectizer.deleteOption
  });

  $style = jQuery('#style-select').selectize({
      plugins: ['remove_button'],
      create: false,
      optgroupField: 'class',
      labelField: 'text',
      searchField: ['text'],
      tax: 'style',
      // Render
      //render: { option: Selectizer.renderOptions },

      render: {
        optgroup_header: function(data, escape) {
          return '<div class="optgroup-header">' + escape(data.text) + '</div>';
        }
      },

      initItem: true,

      // Need to preload, so that Selectize will go get the option
      preload: true,

      // Load
      load: Selectizer.loadOptions,

      onChange: Selectizer.changeOptions,

      onDelete: Selectizer.deleteOption
  });


  $culture = jQuery('#culture-select').selectize({
      plugins: ['remove_button'],
      create: false,
      optgroupField: 'class',
      labelField: 'text',
      searchField: ['text'],
      tax: 'culture',
      // Render
      //render: { option: Selectizer.renderOptions },

      render: {
        optgroup_header: function(data, escape) {
          return '<div class="optgroup-header">' + escape(data.text) + '</div>';
        }
      },

      initItem: true,

      // Need to preload, so that Selectize will go get the option
      preload: true,

      // Load
      load: Selectizer.loadOptions,

      onChange: Selectizer.changeOptions,

      onDelete: Selectizer.deleteOption
  });

  
};
