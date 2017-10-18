$(document).ready(function(e) {
	
     $("#aa li").click(function(){
		 $("#aa+ul li").removeClass("active");
		 $(this).addClass("active").siblings().removeClass("active")
   });
    $("#aa+ul li").click(function(){
		 $("#aa li").removeClass("active");
		 $(this).addClass("active").siblings().removeClass("active")
   });
}); 