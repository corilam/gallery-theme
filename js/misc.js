// Mobile full screen menu
jQuery(document).ready(function () {
            jQuery('.btn-close').fadeOut(200);
            var open = false;
            jQuery('.button a').on('click', function () {
                if (open == false) {
                     jQuery('.overlay, .btn-close').fadeIn(200);
                     jQuery('nav ul li, .btn-open').fadeOut(200);
                    open = true;
                } else {
                     jQuery('.overlay, .btn-close').fadeOut(200)
                     jQuery('nav ul li, .btn-open').fadeIn(200);
                    open = false;
                }
			});
				 jQuery('.overlay').on('mouseup', function(){
 				 jQuery('.overlay, .btn-close').fadeOut(200);
 				 jQuery('nav ul li, .btn-open').fadeIn(200);
 				 open = false;
 				 });
 				 jQuery('.wrap').on('mouseup', function(){
 				 return false;
            });
        })
		
//Waypoint
jQuery('.entry-title-cpt').waypoint(function(direction) {
  alert('Top of notify element hit top of viewport.');
});