		<div id="foot">
					<a href="#">Contact Me</a>
		</div>
		
<script type="text/javascript">
$(document).ready(function(){
	$("#nav-one li").hover(
		function(){ $("ul", this).fadeIn("slow"); }, 
		function() { } 
	);
	if (document.all) {
		$("#nav-one li").hoverClass ("sfHover");
	}
});

$.fn.hoverClass = function(c) {
	return this.each(function(){
		$(this).hover( 
			function() { $(this).addClass(c);  },
			function() { $(this).removeClass(c); }
		);
	});
}; 
</script>