$(".bingo-dot").click(function() {
	var checked = 0;
	var cell = this.id.replace('cell', '');
	
	if($(this).css('background-image') != 'none') {
		$(this).css('background', 'none');
		checked = 0;
	}
	else {
		$(this).css('background-image', 'url(images/daub.png)');
		$(this).css('background-size', 'contain');
		$(this).css('background-repeat', 'no-repeat');
		checked = 1;
	}
	
	var session;
	
	$.ajaxSetup({cache: false})
	$.get('php/update_session.php', {id: cell, value: checked}, function (data) {
		session = jQuery.parseJSON(data);
	});
});