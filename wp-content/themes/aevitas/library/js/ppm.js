jQuery(document).ready(function(){

  cbpBGSlideshow.init()

  initForm();




var $location = jQuery('#location-select').selectize({
    options: [
      {class: 'mammal', value: "dog", name: "Dog" },
      {class: 'mammal', value: "cat", name: "Cat" },
      {class: 'mammal', value: "horse", name: "Horse" },
      {class: 'mammal', value: "kangaroo", name: "Kangaroo" },
      {class: 'bird', value: 'duck', name: 'Duck'},
      {class: 'bird', value: 'chicken', name: 'Chicken'},
      {class: 'bird', value: 'ostrich', name: 'Ostrich'},
      {class: 'bird', value: 'seagull', name: 'Seagull'},
      {class: 'reptile', value: 'snake', name: 'Snake'},
      {class: 'reptile', value: 'lizard', name: 'Lizard'},
      {class: 'reptile', value: 'alligator', name: 'Alligator'},
      {class: 'reptile', value: 'turtle', name: 'Turtle'}
    ],
    optgroups: [
      {value: 'mammal', label: 'Mammal', label_scientific: 'Mammalia'},
      {value: 'bird', label: 'Bird', label_scientific: 'Aves'},
      {value: 'reptile', label: 'Reptile', label_scientific: 'Reptilia'}
    ],
    optgroupField: 'class',
    labelField: 'name',
    searchField: ['name'],
    render: {
      optgroup_header: function(data, escape) {
        return '<div class="optgroup-header">' + escape(data.label) + ' <span class="scientific">' + escape(data.label_scientific) + '</span></div>';
      }
    },
    onChange: function(value) {
      jQuery('.submit_button').attr('disabled','disabled').text('Loading');

      this.disable();
      
      facets.push({tax:'type',id:value});
      console.log($location);

      $location[0].selectize.clearOptions();
      $venue[0].selectize.clearOptions();
      $setting[0].selectize.clearOptions();



      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data : {action: "get_faceted_search",facets:facets},
        success: function(response) {
          var taxomonies = JSON.parse(items);  
          var html = '';
          $location[0].selectize.addOption([
            {class: 'mammal', value: "dog", label: "Dog" },
            {class: 'mammal', value: "cat", label: "Cat" },
            {class: 'mammal', value: "horse", label: "Horse" },
            {class: 'mammal', value: "kangaroo", label: "Kangaroo" },
            {class: 'bird', value: 'duck', label: 'Duck'},
            {class: 'bird', value: 'chicken', label: 'Chicken'},
            {class: 'bird', value: 'ostrich', label: 'Ostrich'},
            {class: 'bird', value: 'seagull', label: 'Seagull'},
            {class: 'reptile', value: 'snake', label: 'Snake'},
            {class: 'reptile', value: 'lizard', label: 'Lizard'},
            {class: 'reptile', value: 'alligator', label: 'Alligator'},
            {class: 'reptile', value: 'turtle', label: 'Turtle'}
          ]);
          console.log(response);
          
          jQuery('.submit_button').removeAttr("disabled").text('Filter');

        }
      })


    }
  }


    );


  var $venue = jQuery('#venue-select').selectize();

  var $setting = jQuery('#setting-select').selectize();



  jQuery('.selectiz1e').selectize({
      sortField: 'text',
      onChange: function(value) {
        jQuery(this).attr('disabled','disabled');
        jQuery('.submit_button').attr('disabled','disabled').text('Loading');

        facets.push({tax:'type',id:value});

        console.log($setting);

        jQuery.ajax({
          type : "post",
          dataType : "json",
          url : myAjax.ajaxurl,
          data : {action: "get_faceted_search",facets:facets},
          success: function(response) {
            var taxomonies = JSON.parse(items);  
            var html = '';

            console.log(response);

            jQuery('.submit_button').removeAttr("disabled").text('Filter');

          }
        })

        this.disable();
      }
  });

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

  jQuery(".fancybox").fancybox({
      fsBtn:true,
      openEffect: 'fade',
      transitionIn: 'fade',
      transitionOut: 'fade',
      padding: 0,
      margin:10,
      helpers   : {
        title : { type : 'inside' },
        buttons : {}
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
      beforeShow: function () {
          if (this.title) {

            console.log(this);
              // New line

              title = this.title;
             
               // Add tweet button
              this.title += '<div class="fancy_social"><a target="blank" href="https://twitter.com/intent/tweet?text='+title+'&url='+this.href+'" class="twitter-share-button"><span class="fa fa-twitter"></span></a>';
              this.title += '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='+this.href+'" class="facebook-share-button"><span class="fa fa-facebook"></span></a>';
              this.title += '<a target="_blank" href="http://www.pinterest.com/pin/create/button/?url={{url}}&media='+this.href+'" class="pinterest-share-button"><span class="fa fa-pinterest"></span></a>';
              this.title += '<a target="_download" href="'+this.href+'" class="download-share-button"><span class="fa fa-download"></span></a>';
              this.title += '<a href="#" class="download-share-button js-expand"><span class="fa fa-expand"></span></a>';
              this.title += '</div>';
          }
      },
      tpl : {
        closeBtn : '<button type="button" class="fancy-box-close"></button>',
        next     : '<div id="slider-next"><a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span class="fa fa-angle-right"></span></a></div>',
        prev     : '<div id="slider-prev"><a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span class="fa fa-angle-left"></span></a></div>'
      }
    });

  var ias = jQuery.ias({
    container:  '.blog_row',
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

  // Add a text when there are no more pages left to load
  ias.extension(new IASPagingExtension());
  ias.extension(new IASHistoryExtension({ prev: '.prev a' }));
  ias.extension(new IASTriggerExtension({ html: '<div class="clearfix"></div><div class="ias-trigger ias-trigger-next" style="text-align: center; cursor: pointer;"><button class="grid_footer--btn footer--btn">Load More <span class="icon icon-angle-down"></span></button></div>'}));


  var facets = [];
  jQuery( document ).on('click','.select-item',function(e) {
    e.preventDefault();
    var tax = jQuery(this).data('taxonomy'),
      tax_id = jQuery(this).data('id'),
      filters = jQuery('.filters'),
      button = jQuery(this);

    jQuery(this).attr('disabled','disabled');
    jQuery('.submit_button').attr('disabled','disabled').text('Loading');

    facets.push({tax:tax,id:tax_id});

    jQuery.ajax({
      type : "post",
      dataType : "json",
      url : myAjax.ajaxurl,
      data : {action: "get_faceted_search",facets:facets},
      success: function(response) {
        var taxomonies = JSON.parse(items);  
        var html = '';

        _.forEach(response.result.facets, function(n, key) {
          html = '';
          _.forEach(n,function(k,count){
            html += '<li><a href="#" class="select-item" data-taxonomy="'+key+'" data-id="'+count+'">'+taxomonies[count].name+'</a></li>';
          })
          jQuery('#'+key).html(html);
        });

        jQuery('input[name="formdata"]').val(JSON.stringify(response.data));

        var html = '<button class="btn btn-default js-remove" data-id="'+tax_id+'">'+button.text()+' <span class="fa fa-times"></span></button>';

        filters.append(html);

        jQuery('.submit_button').removeAttr("disabled").text('Filter');

      }
    })

  });

	jQuery( document ).on('click','.js-remove',function(e) {
    	console.log(e);
    	var tax_id = jQuery(this).data('id');

    	facets = _.filter(facets,function(n){
    		return n.id != tax_id;
    	})

      jQuery(this).remove();
      jQuery('.submit_button').attr('disabled','disabled');

      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data : {action: "get_faceted_search",facets:facets},
        success: function(response) {
          var taxomonies = JSON.parse(items);  
          var html = '';

          _.forEach(response.result.facets, function(n, key) {
            html = '';
            _.forEach(n,function(k,count){
              html += '<li><a href="#" class="select-item" data-taxonomy="'+key+'" data-id="'+count+'">'+taxomonies[count].name+'</a></li>';
            })
            jQuery('#'+key).html(html);
          });

          jQuery('input[name="formdata"]').val(JSON.stringify(response.data));

          var html = '<button class="btn btn-default js-remove" data-id="'+tax_id+'">'+button.text()+' <span class="fa fa-times"></span></button>';

          filters.append(html);

          jQuery('.submit_button').removeAttr("disabled");

        }
      })

  });

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


function ajaxSearch(facetItems) {
  jQuery.ajax({
    type : "post",
    dataType : "json",
    url : myAjax.ajaxurl,
    data : {action: "get_faceted_search",facets:facetItems},
    success: function(response) {
      var taxomonies = JSON.parse(items);  
      var html = '';

      _.forEach(response.result.facets, function(n, key) {
        html = '';
        _.forEach(n,function(k,count){
         // html += '<li><a href="#" class="select-item" data-taxonomy="'+key+'" data-id="'+count+'">'+taxomonies[count].name+'</a></li>';
        })
        jQuery('#'+key).html(html);
      });

      jQuery('input[name="formdata"]').val(JSON.stringify(response.data));
    }
  })
}



var cbpBGSlideshow = (function() {

  var $slideshow = jQuery( '.owl-slider' ),
    $items = jQuery( '.owl-slider' ).find( '.item_gallery' ),
    itemsCount = $items.length;

  function init( config ) {

    console.log( $items);

    // preload the images
    $slideshow.imagesLoaded( function() {
      height = window.innerHeight;
      var $itemP = jQuery( '.owl-item' ).css('height',height);
      

      if( Modernizr.backgroundsize ) {
        $slideshow.find( 'img' ).hide();
        $items.each( function() {
          var $item = jQuery( this );
          $item.css( 'background-image', 'url(' + $item.find( 'img' ).attr( 'src' ) + ')' );
        } );
      }
      else {
        $slideshow.find( 'img' ).show();
        // for older browsers add fallback here (image size and centering)
      }
    } );
    
  }

  return { init : init };

})();

function initHeader() {
    width = window.innerWidth;
    height = window.innerHeight;
    target = {x: width/2, y: height/2};


    largeHeader = document.querySelectorAll('.owl-item');

    largeHeader.style.height = height+'px';

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

    changeOptions: function(value) {

      var selectize = this;
      
      facets.push({tax:selectize.settings.tax,id:value});
      console.log(facets);

    },

    // Usual stuff
    renderOptions: function (data, escape) {
      return '<div>' +
                '<img src="' + escape(data.image) + '" alt="' + data.name + '">' +
                '<span class="title">' +
                    '<span class="name">' + escape(data.name) + '</span>' +
                '</span>' +
                '<span class="code">' + escape(data.code) + '</span>' +
                '<span class="detail">' + escape(data.detail) + '</span>' +
            '</div>';
    }
  };
}();


// The function that runs at form initialization
var initForm = function () {

  // Selectize
  jQuery('#location-select').selectize({
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

      onChange: Selectizer.changeOptions
  });

  jQuery('#type-select').selectize({
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

      onChange: Selectizer.changeOptions
  });

  jQuery('#setting-select').selectize({
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

      onChange: Selectizer.changeOptions
  });

  jQuery('#venue-select').selectize({
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

      onChange: Selectizer.changeOptions
  });

  jQuery('#style-select').selectize({
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

      onChange: Selectizer.changeOptions
  });

  jQuery('#style-select').selectize({
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

      onChange: Selectizer.changeOptions
  });

  jQuery('#culture-select').selectize({
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

      onChange: Selectizer.changeOptions
  });

  
};






