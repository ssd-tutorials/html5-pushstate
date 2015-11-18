var systemObject = {
	run : function() {
		this.content($('#navigation ul li a'));
		this.pop();
		this.runTimer(1);
	},
	content : function(obj) {
		obj.live('click', function(e) {
			var thisUrl = $(this).attr('href');
			var thisTitle = $(this).attr('title');
			systemObject.load(thisUrl);
			window.history.pushState(null, thisTitle, thisUrl);
			e.preventDefault();
		});
	},
	pop : function() {
		window.onpopstate = function() {
			systemObject.load(location.pathname);
		};
	},
	load : function(url) {
		url = url === '/' ? '/ygwyg' : url;
		jQuery.getJSON(url, { ajax : 1 }, function(data) {
			jQuery.each(data, function(k, v) {
				$('#' + k + ' section').fadeOut(200, function() {
					$(this).replaceWith($(v).hide().fadeIn(200));
				});
			});
		});
	},
	timer : function(n) {
		setTimeout(function() {
			$('#timer').html(n);
			systemObject.runTimer(n);
		}, 1000);
	},
	runTimer : function(n) {
		var thisNumber = parseInt(n, 10) + 1;
		systemObject.timer(thisNumber);
	}
};
$(function() {
	systemObject.run();
});











