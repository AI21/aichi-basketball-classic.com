$(function(){

	//参加チーム設定
	var entryTeam = new Array();
	var entryTeamPhoto = new Array();

	// チーム設定から全チーム情報を取得
	for(var i in entryTeams){
        for(var j in entryTeams[i].entry){
			// チーム名と写真名
			entryTeam.push(entryTeams[i].entry[j].team);
			entryTeamPhoto.push(entryTeams[i].entry[j].photo);
        }
    }

	// HOMEのみ
	if ($('#home').length) {
		// ランダム画像：チーム
		var l = entryTeam.length;
		var r = Math.floor(Math.random()*l);
		var imgurl = './common/image/team/' + entryTeamPhoto[r] + '.jpg';
		$("img#randTeamImg").attr({"src":imgurl});
	}

	// チームリスト
	if ($('#teamlist').length) {

		for(var i in entryTeams){
			var blockName = entryTeams[i].view;
			var blockNameLow = entryTeams[i].block.toLowerCase();
			var entryBody = $('<ul>').addClass('list');

			$("#teamlist").append('<div class="blockname mix all block-' + blockNameLow + ' block' + blockNameLow + '">' + blockName);

			for(var j in entryTeams[i].entry){
				var teamNo = entryTeams[i].entry[j].no;
				var teamName = entryTeams[i].entry[j].team;
				var teamPhoto = entryTeams[i].entry[j].photo;

				var newLi = $('<li class="team">')
					.append('<a href="./team.html?tid=' + teamNo + '">' + teamName + '</a>');

				entryBody.append(newLi);
			}
			$("#teamlist").append(entryBody);
		}
		// $("#teamlist").append('<div class="gap">').append('<div class="gap">');

		// $('#teamlist').mixItUp({
		// 	load: {
		// 		filter: '.all'
		// 	}
		// });
		// $(".imgtada").tada();
	}

});
