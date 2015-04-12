  
	$(window).load(function() {
		$("#status").fadeOut();
		$("#preloader").delay(350).fadeOut("slow");
	})  
	
	
		$(document).ready(
	function() {  
		$("html").niceScroll();
		}
	);	



	/*global $:false */
	$(function(){"use strict";
		$('#video-wrap').css({'height':($(window).height())+'px'});
		$(window).resize(function(){
		$('#video-wrap').css({'height':($(window).height())+'px'});
		});
	});

	
	
			$(document).ready(function(){
			
			try {
				isTouchDevice = true;
				document.createEvent('TouchEvent');
			} catch (e) {
				isTouchDevice = false;			
			}
			
			if(!isTouchDevice){
				
				<!-- Load Video for mobile desktop -->
				$(function() {
					var BV = new $.BigVideo({useFlashForFirefox:false});
					BV.init();
					BV.show('vids/video.mp4', {altSource:'vids/video.ogv'});
				});
				
				<!-- Allow to open the site -->
				siteStartOpen = true;
				
			}
			
		}); 	
	