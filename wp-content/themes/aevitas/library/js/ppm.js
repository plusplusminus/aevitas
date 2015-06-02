jQuery(document).ready(function(){

  jQuery(".fancybox").fancybox();

  var ias = jQuery.ias({
    container:  '.blog_row',
    item:       '.js-infinite',
    pagination: '.wp-prev-next',
    next:       '.prev-link > a'
  });

  // Add a text when there are no more pages left to load
  ias.extension(new IASPagingExtension());
  ias.extension(new IASHistoryExtension({ prev: '.prev a' }));
  ias.extension(new IASTriggerExtension({ html: '<div class="clearfix"></div><div class="grid_footer--btn ias-trigger ias-trigger-next" style="text-align: center; cursor: pointer;"><button class="grid_footer--btn footer--btn">Load More <span class="icon icon-angle-down"></span></button></div>'}));


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

  jQuery('.section_gallery').slick({
  	dots: true,
  	arrows: false,
  });

  jQuery('.slider').slick({
  	dots: false,
  	arrows: true,
  	adaptiveHeight: true,
  	slidesToShow: 1,
  	lazyLoad: true
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

var tx = 0; // current translation
var tdir = 0;
var slidepseactive = false;

// helper function to get current translate3d positions 
// as per http://stackoverflow.com/a/7982594/826194
function getTransform(el) {
  var results = jQuery(el).css('-webkit-transform').match(/matrix(?:(3d)\(-{0,1}\d+(?:, -{0,1}\d+)*(?:, (-{0,1}\d+))(?:, (-{0,1}\d+))(?:, (-{0,1}\d+)), -{0,1}\d+\)|\(-{0,1}\d+(?:, -{0,1}\d+)*(?:, (-{0,1}\d+))(?:, (-{0,1}\d+))\))/)
  if(!results) return [0, 0, 0];
  if(results[1] == '3d') return results.slice(2,5);
  results.push(0);
  return results.slice(5, 8);
}

// set the translate x position of an element
function translate3dX($e, x) {
  $e.css({
    // TODO: depending on the browser we need one of those, for now just chrome
    //'-webkit-transform': 'translate3d(' +String(x) + 'px, 0px, 0px)'
    //, '-moz-transform': 'translate3d(' +String(x) + 'px, 0px, 0px)'
    'transform': 'translate3d(' +String(x) + 'px, 0px, 0px)'
  });
};

// will slide to the left or to the right
function slidePS(direction) {
  if (slidepseactive) // prevent interruptions
    return;

  tdir = -1;
  if (direction == "left") {
    tdir = 1;
  }

  // get the current slides transition position
  var t = getTransform(".pswp__container");
  tx = parseInt(t[0]);

  // reset anim counter (you can use any property as anim counter)
  jQuery(".pswp__container").css("text-indent", "0px");

  slidepseactive = true;
  jQuery(".pswp__container").animate(
    {textIndent: 100},{
      step: function (now, fx) {
        // here 8.7 is the no. of pixels we move per animation step %
        // so in this case we slide a total of 870px, depends on your setup
        // you might want to use a percentage value, in this case it was
        // a popup thats why it is a a fixed value per step
        translate3dX(jQuery(this), tx + Math.round(8.7 * now * tdir));
      },
      duration: '300ms',
      done: function () {
        // now that we finished sliding trigger the original buttons so 
        // that the photoswipe state reflects the new situation
        slidepseactive = false;
        if (tdir == -1)
          jQuery(".pswp__button--arrow--right").trigger("click");
        else
          jQuery(".pswp__button--arrow--left").trigger("click");
      }
    },
    'linear');
}

// now activate our buttons
jQuery(function(){

  jQuery(".NEW-button-left").click(function(){
    slidePS("left");
  });

  jQuery(".NEW-button-right").click(function(){
    slidePS("right");
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
          html += '<li><a href="#" class="select-item" data-taxonomy="'+key+'" data-id="'+count+'">'+taxomonies[count].name+'</a></li>';
        })
        jQuery('#'+key).html(html);
      });

      jQuery('input[name="formdata"]').val(JSON.stringify(response.data));
    }
  })
}







