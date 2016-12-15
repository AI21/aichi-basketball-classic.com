$(function(){

	$('.remodal-overlay').css('display','none');
	$('.remodal-wrapper').css('display','none');

	$('.result__btn').on('click', function () {

		// ゲームID取得
		var gameId = $(this).val();

		var homeTeamName;
		var awayTeamName;

		var homeScore1 = 0;
		var homeScore2 = 0;
		var homeScore3 = 0;
		var homeScore4 = 0;
		var homeScoreOt1 = 0;
		var homeScoreOt2 = 0;
		var homeScoreTotal = 0;
		var awayScore1 = 0;
		var awayScore2 = 0;
		var awayScore3 = 0;
		var awayScore4 = 0;
		var awayScoreOt1 = 0;
		var awayScoreOt2 = 0;
		var awayScoreTotal = 0;

		// console.log(gameId);

		$('[data-remodal-id=resultGame]').remodal().open();

		// $("#gid").text(gameId);

		if ($('#resultGame').length) {

			// var viewTeamNo = null;
			// var viewTeamName;
			// var viewTeamPhoto;
			// var viewTeamMemberPhoto;
			var homeStatzImg;
			var awayStatzImg;

			for(var i in resultGames){

				var resultGamesId = resultGames[i].gameId;

				if ( resultGamesId == gameId ) {

					for(var j in resultGames[i].home){

						homeTeamName = resultGames[i].home[0]["TEAM"];
						homeScore1 = parseInt(resultGames[i].home[0]["1Q"]);
						homeScore2 = parseInt(resultGames[i].home[0]["2Q"]);
						homeScore3 = parseInt(resultGames[i].home[0]["3Q"]);
						homeScore4 = parseInt(resultGames[i].home[0]["4Q"]);
						if (resultGames[i].home[0]["OT1"] !== undefined) {
							homeScoreOt1 = parseInt(resultGames[i].home[0]["OT1"]);
							$("#homeScoreOt1").text(homeScoreOt1);
						}
						if (resultGames[i].home[0]["OT2"] !== undefined) {
							homeScoreOt2 = parseInt(resultGames[i].home[0]["OT2"]);
							$("#homeScoreOt2").text(homeScoreOt2);
						}

						homeScoreTotal = homeScore1 + homeScore2 + homeScore3 + homeScore4 + homeScoreOt1 + homeScoreOt2;

						console.log(homeTeamName);

					}

					for(var j in resultGames[i].away){

						awayTeamName = resultGames[i].away[0]["TEAM"];
						awayScore1 = parseInt(resultGames[i].away[0]["1Q"]);
						awayScore2 = parseInt(resultGames[i].away[0]["2Q"]);
						awayScore3 = parseInt(resultGames[i].away[0]["3Q"]);
						awayScore4 = parseInt(resultGames[i].away[0]["4Q"]);
						if (resultGames[i].away[0]["OT1"] !== undefined) {
							awayScoreOt1 = parseInt(resultGames[i].away[0]["OT1"]);
							$("#awayScoreOt1").text(awayScoreOt1);
						}
						if (resultGames[i].away[0]["OT2"] !== undefined) {
							awayScoreOt2 = parseInt(resultGames[i].away[0]["OT2"]);
							$("#awayScoreOt2").text(awayScoreOt2);
						}

						awayScoreTotal = (awayScore1 + awayScore2 + awayScore3 + awayScore4 + awayScoreOt1 + awayScoreOt2);

						console.log(awayTeamName);

					}
				}
			}

			$(".homeTeamName").text(homeTeamName);
			$("#homeScore1").text(homeScore1);
			$("#homeScore2").text(homeScore2);
			$("#homeScore3").text(homeScore3);
			$("#homeScore4").text(homeScore4);
			$("#homeScoreTo").text(homeScoreTotal);
			$(".awayTeamName").text(awayTeamName);
			$("#awayScore1").text(awayScore1);
			$("#awayScore2").text(awayScore2);
			$("#awayScore3").text(awayScore3);
			$("#awayScore4").text(awayScore4);
			$("#awayScoreTo").text(awayScoreTotal);

			homeStatzImg = './image/result/' + gameId + 'h.jpg';
			awayStatzImg = './image/result/' + gameId + 'a.jpg';

			$("#homeStatz").html('<img src="' + homeStatzImg + '" alt="チーム[' + homeTeamName + '] 個人成績">');

			$("#awayStatz").html('<img src="' + awayStatzImg + '" alt="チーム[' + awayTeamName + '] 個人成績">');

		}
	});

});
