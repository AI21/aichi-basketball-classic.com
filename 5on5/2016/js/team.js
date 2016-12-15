$(function(){

	// GETパラメータ取得
	var getTid = null;
	//URL取得
	var url = location.href;
	//URL分割
	parameters = url.split("?");
	//パラメータあり
	if( parameters.length > 1 ) {
		//分割
		var params   = parameters[1].split("&");
		//パラメータ配列
		var paramsArray = [];
		//パラメータ数繰り返し
		for ( i = 0; i < params.length; i++ ) {
			var neet = params[i].split("=");
			paramsArray.push(neet[0]);
			paramsArray[neet[0]] = neet[1];
		}
		//Get Param
		getTid = paramsArray["tid"];
	}

	// パラメータ取得NG
	if ( typeof getTid === 'undefined' ) {
		$("#memberList").append('<div class="dataNone">チーム情報が取得できませんでした。');
	}

	// チーム情報
	if ($('#memberList').length) {

		var viewTeamNo = null;
		var viewTeamName;
		var viewTeamPhoto;
		var viewTeamMemberPhoto;

		for(var i in entryTeams){

			for(var j in entryTeams[i].entry){

				// チームNO
				var teamNo = entryTeams[i].entry[j].no;

				if ( teamNo === getTid ) {
					viewTeamNo = teamNo;
					viewTeamName = entryTeams[i].entry[j].team;
					// チーム写真
					viewTeamPhoto = './image/team/pic_' + entryTeams[i].entry[j].photo + '.jpg';
					// チームメンバー
					viewTeamMemberPhoto = './image/team/' + entryTeams[i].entry[j].photo + '.jpg';
					// メンバーの画像チェック
				}
			}
		}

		// チーム情報取得OKなら表示
		if ( viewTeamNo != null ) {
			if ( viewTeamNo == 23 ) {
				$("#memberList")
					.append('<p class="title">登録選手一覧</p>')
					.append('<img src="' + viewTeamMemberPhoto + '" alt="チーム[' + viewTeamName + ']選手一覧">');
			} else {
				$("#memberList")
					.append('<img src="' + viewTeamPhoto + '" alt="' + viewTeamName + '">')
					.append('<p class="title">登録選手一覧</p>')
					.append('<img src="' + viewTeamMemberPhoto + '" alt="チーム[' + viewTeamName + ']選手一覧">');
			}

			$('#teamName').append('チーム ： ' + viewTeamName);
		} else {
			$("#memberList").append('<div class="dataNone">チーム情報が取得できませんでした。');
			$('#teamName').remove();
		}

	}

});
