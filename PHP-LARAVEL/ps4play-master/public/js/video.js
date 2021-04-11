jQuery(document).ready(function($) {
	

	var width  = $('#imageTooltip').width();
	var height = $('#imageTooltip').height();
	var vid_id = $('#videoId').val();
	var offset = -(10 + height).toString();
	var iframe = "<iframe width=" + width + " height=" + height +
				 " src='http://www.youtube.com/embed/"+
				  vid_id+"?rel=0&autoplay=1' frameborder='0' allowfullscreen></iframe>";


            $('#imageTooltip').tooltipster({
 		 	 content: $(iframe),
 		 	 theme: 'light',
 		 	 offsetY: offset+"px"
 		});
      
});