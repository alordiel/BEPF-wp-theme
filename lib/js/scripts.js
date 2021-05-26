jQuery(document).ready(function(){
	$ = jQuery;
		if ($("body").hasClass("woocommerce-page")) {
			$("#sidebar-left").remove();
			$("#main").removeClass("col-md-push-2");
			$("#main").addClass("col-md-9 col-lg-9");
			$("a.button").addClass("btn btn-success");
			$("a.button").removeClass("button");
			$("button").addClass("btn btn-success");
			$("input").addClass("form-control");
			$("textarea").addClass("form-control");

}
});