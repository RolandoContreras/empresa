$(function(){
	//script para ativaÃ§Ã£o do input-slider-bool
	$("body").on("click",".input-slider > input", function(){
		$(this).parent().toggleClass("on");
		
		if($(this).parent().hasClass("on"))
			$(this).parent().find(".selected").text($(".desactived-yes").text());
		else
			$(this).parent().find(".selected").text($(".desactived-no").text());
	});

	//Dropdown Menu
	
	$(".main-menu a").click(function(){
			//slide up all the link lists
			$(".main-menu ul ul").slideUp();
			//slide down the link list below the h3 clicked - only if its closed
			if(!$(this).next().is(":visible"))
			{
				$(this).next().slideDown();
			}
	});

	//FAQ
	
	$(".faq a").click(function(){
			//slide up all the link lists
			$(".faq div").slideUp();
			//slide down the link list below the h3 clicked - only if its closed
			if(!$(this).next().is(":visible"))
			{
				$(this).next().slideDown();
			}
	});

			
	//script da ativaÃ§Ã£o do menu para mobile
	$("body").on("click",".control-header > .activate-menu", function(){
		$("body").toggleClass("menu-on");
	});

    $("body").on("click",".menu-toggler", function(){
        $("body").toggleClass("menu-on");
    });

	//Dropdown NotificaÃ§Ãµes do Topo
    $(".notification-dropdown").each(function (index, o) {
        var pop = $(o);
        var dialog = pop.find(".pop-dialog");
        var trigg = pop.find(".trigger");

        dialog.on("click", function (e) {
            e.stopPropagation()
        });
        dialog.find(".close-icon").on("click", function (e) {
            e.preventDefault();
            dialog.removeClass("is-visible");
            trigg.removeClass("active");
        });
        $("body").on("click", function () {
            dialog.removeClass("is-visible");
            trigg.removeClass("active");
        });

        trigg.on("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            // hide all other pop-dialogs
            $(".notification-dropdown .pop-dialog").removeClass("is-visible");
            $(".notification-dropdown .trigger").removeClass("active");

            dialog.toggleClass("is-visible");
            if (dialog.hasClass("is-visible")) {
                $(this).addClass("active");
            } else {
                $(this).removeClass("active");
            }
        });
    });
});



function askToken(type){
    $.ajax({
        url: "/Operations/request_token/"+type
    }).done(function(r){
        alert(r);
    }) ;
}