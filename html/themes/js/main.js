$(function() {

	$(".topbar .down").click(function(){
		$(this).toggleClass("clicked").siblings(".subMenu").slideToggle(128);
	});

	$("#portfolio").easyResponsiveTabs();

	$("#product section").easyResponsiveTabs();

	$(".titleClick .shirtButton").click(function(){
		$(".titlePage").removeClass("active").addClass("disable");
		$(this).addClass("active").removeClass("disable");
		$(".productThumb").addClass("hide");
		$(".shirt").removeClass("hide");
	});
	$(".titleClick .jacketButton").click(function(){
		$(".titlePage").removeClass("active").addClass("disable");
		$(this).addClass("active").removeClass("disable");
		$(".productThumb").addClass("hide");
		$(".jacket").removeClass("hide");
	});
	$(".titleClick .sweatherButton").click(function(){
		$(".titlePage").removeClass("active").addClass("disable");
		$(this).addClass("active").removeClass("disable");
		$(".productThumb").addClass("hide");
		$(".sweather").removeClass("hide");
	});
	$(".titleClick .uniformButton").click(function(){
		$(".titlePage").removeClass("active").addClass("disable");
		$(this).addClass("active").removeClass("disable");
		$(".productThumb").addClass("hide");
		$(".uniform").removeClass("hide");
	});

	$(".toggleDown").click(function(){
		$(this).toggleClass("toggleDrawer").parent().parent().parent().siblings(".toggleMenu").slideToggle(128);
	});

	$(".heroBanner").owlCarousel({
		itemsCustom : [
			[0, 1],
			[480, 1],
			[768, 1],
			[1024, 1],
			[1400, 1],
			[1600, 1],
		],
		autoPlay : false,
		pagination: true,
		autoHeight: true,
		touchDrag: false
	});

	$(".client .clientArea").owlCarousel({
		itemsCustom : [
			[0, 2],
			[480, 3],
			[768, 4],
			[1024, 5],
			[1400, 6],
			[1600, 6],
		],
		autoPlay : true,
		pagination: false
	});

	$(".thumbView.promo .slideImage").owlCarousel({
		itemsCustom : [
			[0, 1],
			[480, 1],
			[768, 1],
			[1024, 1],
			[1400, 1],
			[1600, 1],
		],
		autoPlay : true,
		pagination: true,
		navigation: false
	});


	var sync1 = $("#sync1");
	var sync2 = $("#sync2");

	sync1.owlCarousel({
		singleItem : true,
		navigation: false,
		pagination:false,
		afterAction : syncPosition,
		responsiveRefreshRate : 200,
		touchDrag: false
	});

	sync2.owlCarousel({
		itemsCustom : [
			[0, 3],
			[480, 3],
			[768, 3],
			[1024, 4],
			[1400, 4],
			[1600, 4],
		],
		pagination:false,
		responsiveRefreshRate : 100,
		afterInit : function(el){
			el.find(".owl-item").eq(0).addClass("synced");
		}
	});

	function syncPosition(el){
		var current = this.currentItem;
		$("#sync2")
			.find(".owl-item")
			.removeClass("synced")
			.eq(current)
			.addClass("synced")
		if($("#sync2").data("owlCarousel") !== undefined){
			center(current)
		}
	}

	$("#sync2").on("click", ".owl-item", function(e){
		e.preventDefault();
		var number = $(this).data("owlItem");
		sync1.trigger("owl.goTo",number);
	});

	function center(number){
		var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
		var num = number;
		var found = false;
		for(var i in sync2visible){
			if(num === sync2visible[i]){
				var found = true;
			}
		}

		if(found===false){
			if(num>sync2visible[sync2visible.length-1]){
				sync2.trigger("owl.goTo", num - sync2visible.length+2)
			}else{
				if(num - 1 === -1){
					num = 0;
				}
				sync2.trigger("owl.goTo", num);
			}
		} else if(num === sync2visible[sync2visible.length-1]){
			sync2.trigger("owl.goTo", sync2visible[1])
		} else if(num === sync2visible[0]){
			sync2.trigger("owl.goTo", num-1)
		}
	}


	function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: new google.maps.LatLng(44.5403, -78.5463),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
            var map = new google.maps.Map(mapCanvas, mapOptions)
        }
    google.maps.event.addDomListener(window, 'load', initialize);

})