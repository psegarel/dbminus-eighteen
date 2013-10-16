/*
* Author:      Marco Kuiper (http://www.marcofolio.net/)
*              Sylvain Papet (http://www.com-ocean.com/)
*              Toxic Web (http://www.toxic-web.co.uk/) - v1.0.1
*/  
(function($) {
  $.bgimgSlideshow = {version: '1.0.1'};
  $.fn.bgimgSlideshow = function(options) {
    options = jQuery.extend({
      slideshowSpeed: slideshowSpeed,
	  method : slideEffect, /* slide or fade, default is fade */
      fadeSpeed :1600, /* how quickly one image fades/slides into the next */
	
      photos : [],
     
      },options);

    var interval;
    var activeContainer = 1;	
    var currentImg = 0;
    var started = false;
    var animating = false;
    var currentZindex = -1;
    
    var image_cache = [];

    $.bgimgSlideshow.preLoadImage = function() {
      var args_len = arguments.length;
      for (var i = args_len; i--;) {
        var cacheImage = document.createElement('img');
        cacheImage.src = arguments[i];
        image_cache.push(cacheImage);
      }
    }

    $.bgimgSlideshow.preLoadPhotoObjects = function(photoObjects) {
      for(i in photoObjects)
      {
        $.bgimgSlideshow.preLoadImage(photoObjects[i].image, photoObjects[i].image);
      }
    }

    $.bgimgSlideshow.initialize = function() {
      $.bgimgSlideshow.preLoadPhotoObjects(options.photos);
  		
		  // Backwards navigation
      $("#back").click(function() {
      	$.bgimgSlideshow.stopSlideshow();
      	$.bgimgSlideshow.navigate("back");
      });
      
      // Forward navigation
      $("#next").click(function() {
        $.bgimgSlideshow.stopSlideshow();
      	$.bgimgSlideshow.navigate("next");
      });
      
      $("#control").click(function(){ 
        if(started)
        {
          $.bgimgSlideshow.stopSlideshow();
        }
        else
        {
          $.bgimgSlideshow.startSlideshow();
        }
      });
      $.bgimgSlideshow.startSlideshow();
    };
    
    $.bgimgSlideshow.navigate = function(direction) {
    	// Check if no animation is running. If it is, prevent the action
    	if(animating) {
    		return;
    	}    	
    	// Check which current image we need to show
    	if(direction == "next") {
    		currentImg++;
    		if(currentImg == options.photos.length + 1) {
    			currentImg = 1;
    		}
    	} else {
    		currentImg--;
    		if(currentImg == 0) {
    			currentImg = options.photos.length;
    		}
    	}
    	
    	// Check which container we need to use
    	var currentContainer = activeContainer;
    	if(activeContainer == 1) {
    		activeContainer = 2;
    	} else {
    		activeContainer = 1;
    	}
    	
    	$.bgimgSlideshow.showImage((currentImg - 1), currentContainer, activeContainer);
    };
    
    $.bgimgSlideshow.showImage = function(numImg, currentContainer, activeContainer) {
      var photoObject = options.photos[numImg];
    	animating = true;
    	
    	// Make sure the new container is always on the background
    	currentZindex--;
    	
    	// Set the background image of the new active container
    	$("#headerimg" + activeContainer).css({
    		"background-image" : "url(" + photoObject.image + ")",
    		"display" : "block",
    		"z-index" : currentZindex,
			"filter" : "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=" + photoObject.image + ", sizingMethod='scale')",
	       "-ms-filter": "progid:DXImageTransform.Microsoft.AlphaImageLoader(src=" + photoObject.image + ", sizingMethod='scale')"
    	});
    	
		// Hide the header text
		
		
		// Set the new header text
		$("#firstline").html(photoObject.firstline);
		$("#secondline")
			.attr("href", photoObject.url)
			.html(photoObject.secondline);
		$("#link")
			.attr("href", photoObject.url)
			.html(photoObject.link);

    	// Fade out the current container
    	// and display the header text when animation is complete
		
		if(options.method == "slide"){
		$("#headerimg" + currentContainer).animate({width: 'toggle'},options.fadeSpeed,function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
    	});
		}
		if(options.method == "slideup"){
		$("#headerimg" + currentContainer).animate({height: 'toggle'},options.fadeSpeed,function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
    	});
		}
		if(options.method == "swing"){
			$("#headerimg" + currentContainer).animate({height: 'toggle', width: 'toggle'},options.fadeSpeed,function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
    	});
		}
		if(options.method == "none"){
			$("#headerimg" + currentContainer).fadeOut(0,function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
    	});
		}
		if(options.method == "fade"){
			$("#headerimg" + currentContainer).fadeOut(options.fadeSpeed,function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
    	});
		}
		else{
			$("#headerimg" + currentContainer).fadeOut(options.fadeSpeed,function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
    	});
			}
    };

    $.bgimgSlideshow.stopSlideshow = function() {
    	// Change the background image to "play"
      $("#control").css({ "background-image" : "url(sites/all/themes/InspiroB/images/play.png)" });
    	// Clear the interval
    	clearInterval(interval);
      started = false;
    };
    
    $.bgimgSlideshow.startSlideshow = function() {
      $("#control").css({ "background-image" : "url(sites/all/themes/InspiroB/images/pause.png)" });
    	$.bgimgSlideshow.navigate("next");
    	interval = setInterval(function() { $.bgimgSlideshow.navigate("next"); }, options.slideshowSpeed);
      started = true;
    };    
        
    $.bgimgSlideshow.initialize();
    return this;
  }
 
})(jQuery);