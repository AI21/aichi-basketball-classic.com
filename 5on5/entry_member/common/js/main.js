$(function(){

	var removeObj;
	var objRequire;

	$('[name=ligamenbers]').click(function() {
		if ($('input[name=ligamenbers]:eq(0)').prop('checked')) {
			removeObj = $('.setPlayers').detach();
			objRequire = $('input[name=require]').detach();
		} else {
			$('#messageArea').before(removeObj);
			$('button#submit').before(objRequire);
		}
	});
});
