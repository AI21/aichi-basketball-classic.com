<?php
require_once('set_team.php');

$blnSetTeam = FALSE;
$arySetTeamData = array();

// パスワードからチーム情報を取得
if ( isset($_GET['pw']) == TRUE ) {
	$strPw = preFilters($_GET['pw']);
	$intTeamCnt = count($aryTeamData);
	for ( $i=0; $i<$intTeamCnt; $i++ ) {
		if ( $aryTeamData[$i]['PASSWORD'] === $strPw ) {
			$arySetTeamData = $aryTeamData[$i];
			$blnSetTeam = TRUE;
		}
	}
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta name="viewport" content="width=480">
	<title>5on5トーナメント 選手登録フォーム | Aichi BasketBall Classic</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="愛知最強決定戦[ Aichi BasketBall Classic ]の5on5トーナメント大会への選手登録フォームです。">
	<meta name="keywords" content="5on5,バスケ,トーナメント,basketball,バスケットボール">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0">
	<link rel="stylesheet" href="./common/css/fillter.css">
	<!--[if lt IE 9]>
	<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<script src="../../common/js/css3-mediaqueries.js"></script>
	<![endif]-->
</head>
<body id="home">
<div id="wrapper">
	<header id="pageHead" role="banner">
		<h2>愛知最強決定戦 [ Aichi BasketBall Classic ] 5on5トーナメントの選手登録フォームです。</h2>
		<h1>Aichi BasketBall Classic</h1>
	</header>
	<!-- メインコンテンツ-->
	<div id="contents" class="clearfix">
		<main role="main">
			<section id="invitationArea">
				<h2>愛知最強5on5トーナメント決定戦</h2>
				<h3>チーム所属選手登録フォーム</h3>
				<div class="gaiyou">
					<h4>愛知最強5on5トーナメント決定戦 選手登録概要</h4>
					<div class="inner">
						<p class="tx-l">
							下記の条件を満たす選手をご登録ください。
						</p>
						<dl>
							<dt>人数制限</dt><dd>18名まで</dd>
							<dt>年　齢</dt><dd>16歳以上</dd>
							<dt>性　別</dt><dd>男女問わず</dd>
							<dt>背番号</dt><dd>0〜99番まで ※ 重複番号登録は不可<br>　 （0付き1桁番号の”01と1”は同番号とします）</dd>
						</dl>
					</div>
				</div>
				<div class="invitationForm">
					<h4>愛知最強5on5トーナメント決定戦 選手登録内容</h4>
					<p>
						背番号 / 氏名(ヨミカナ) / ポジション / 身長
					</p>
				</div>
				<div class="invitationForm">
					<h4>愛知最強5on5トーナメント決定戦 チーム所属選手入力フォーム</h4>
					<form action="./zeromail.php" method="post" class="zeromail">
						<fieldset>
							<table id="entryForm">
								<caption><small class="alert">※</small>の項目は入力必須です。</caption>
								<tr>
									<th colspan="2" class="dataSub">チーム名 <small class="alert">※</small></th>
									<td>
										<?php if ( $blnSetTeam == TRUE ) : ?>
										<?php echo $arySetTeamData['TEAM_NAME']; ?>
											<input name="teamname_req" type="hidden" value="<?php echo $arySetTeamData['TEAM_NAME']; ?>">
											<input name="id" type="hidden" value="_setteam">
										<?php else : ?>
										<input name="teamname_req" type="text" size="43">
										<?php endif; ?>
									</td>
								</tr>
								<?php if ( $blnSetTeam == TRUE ) : ?>
								<tr>
									<th colspan="2" class="dataSub">確認メール</th>
									<td>
										<input name="confmailflg[]" type="radio" value="不要" id="mailoff"><label for="mailoff">不要</label>　
										<input name="confmailflg[]" type="radio" value="必要" id="mailon"><label for="mailon">必要</label><br>
										宛先：<input name="confmail" type="text" size="43" value="<?php echo $arySetTeamData['REP_MAIL']; ?>">
									</td>
								</tr>
								<?php else : ?>
								<tr>
									<th colspan="2" class="dataSub">メールアドレス</th>
									<td>
										<input name="confmail" type="text" size="43"><br>
										<small>登録内容の控えメールが必要な場合は、ご入力ください</small>
									</td>
								</tr>
								<?php endif; ?>
								<tr>
									<th rowspan="2" class="players">選手1</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name1_req" type="text" size="36"><br>
										カナ：<input name="kana1_req_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall1_req_num" type="text" size="8"> cm　
										<input name="pos1_req[]" type="radio" value="PG" id="pg1"><label for="pg1">PG</label>　
										<input name="pos1_req[]" type="radio" value="SG" id="sg1"><label for="sg1">SG</label>　
										<input name="pos1_req[]" type="radio" value="SF" id="sf1"><label for="sf1">SF</label>　
										<input name="pos1_req[]" type="radio" value="PF" id="pf1"><label for="pf1">PF</label>　
										<input name="pos1_req[]" type="radio" value="C" id="cc1"><label for="cc1">C</label>
									</td>
								</tr>
								<tr>
								<!--選手2-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手2</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name2_req" type="text" size="36"><br>
										カナ：<input name="kana2_req_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall2_req_num" type="text" size="8"> cm　
										<input name="pos2_req[]" type="radio" value="PG" id="pg2"><label for="pg2">PG</label>　
										<input name="pos2_req[]" type="radio" value="SG" id="sg2"><label for="sg2">SG</label>　
										<input name="pos2_req[]" type="radio" value="SF" id="sf2"><label for="sf2">SF</label>　
										<input name="pos2_req[]" type="radio" value="PF" id="pf2"><label for="pf2">PF</label>　
										<input name="pos2_req[]" type="radio" value="C" id="cc2"><label for="cc2">C</label>
									</td>
								</tr>
								<!--選手3-->
								<tr>
									<th rowspan="2" class="players">選手3</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name3_req" type="text" size="36"><br>
										カナ：<input name="kana3_req_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall3_req_num" type="text" size="8"> cm　
										<input name="pos3_req[]" type="radio" value="PG" id="pg3"><label for="pg3">PG</label>　
										<input name="pos3_req[]" type="radio" value="SG" id="sg3"><label for="sg3">SG</label>　
										<input name="pos3_req[]" type="radio" value="SF" id="sf3"><label for="sf3">SF</label>　
										<input name="pos3_req[]" type="radio" value="PF" id="pf3"><label for="pf3">PF</label>　
										<input name="pos3_req[]" type="radio" value="C" id="cc3"><label for="cc3">C</label>
									</td>
								</tr>
								<!--選手4-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手4</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name4_req" type="text" size="36"><br>
										カナ：<input name="kana4_req_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall4_req_num" type="text" size="8"> cm　
										<input name="pos4_req[]" type="radio" value="PG" id="pg4"><label for="pg4">PG</label>　
										<input name="pos4_req[]" type="radio" value="SG" id="sg4"><label for="sg4">SG</label>　
										<input name="pos4_req[]" type="radio" value="SF" id="sf4"><label for="sf4">SF</label>　
										<input name="pos4_req[]" type="radio" value="PF" id="pf4"><label for="pf4">PF</label>　
										<input name="pos4_req[]" type="radio" value="C" id="cc4"><label for="cc4">C</label>
									</td>
								</tr>
								<!--選手5-->
								<tr>
									<th rowspan="2" class="players">選手5</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name5_req" type="text" size="36"><br>
										カナ：<input name="kana5_req_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall5_req_num" type="text" size="8"> cm　
										<input name="pos5_req[]" type="radio" value="PG" id="pg5"><label for="pg5">PG</label>　
										<input name="pos5_req[]" type="radio" value="SG" id="sg5"><label for="sg5">SG</label>　
										<input name="pos5_req[]" type="radio" value="SF" id="sf5"><label for="sf5">SF</label>　
										<input name="pos5_req[]" type="radio" value="PF" id="pf5"><label for="pf5">PF</label>　
										<input name="pos5_req[]" type="radio" value="C" id="cc5"><label for="cc5">C</label>
									</td>
								</tr>
								<!--選手6-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手6</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name6" type="text" size="36"><br>
										カナ：<input name="kana6_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall6_num" type="text" size="8"> cm　
										<input name="pos6[]" type="radio" value="PG" id="pg6"><label for="pg6">PG</label>　
										<input name="pos6[]" type="radio" value="SG" id="sg6"><label for="sg6">SG</label>　
										<input name="pos6[]" type="radio" value="SF" id="sf6"><label for="sf6">SF</label>　
										<input name="pos6[]" type="radio" value="PF" id="pf6"><label for="pf6">PF</label>　
										<input name="pos6[]" type="radio" value="C" id="cc6"><label for="cc6">C</label>
									</td>
								</tr>
								<!--選手7-->
								<tr>
									<th rowspan="2" class="players">選手7</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name7" type="text" size="36"><br>
										カナ：<input name="kana7_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall7_num" type="text" size="8"> cm　
										<input name="pos7[]" type="radio" value="PG" id="pg7"><label for="pg7">PG</label>　
										<input name="pos7[]" type="radio" value="SG" id="sg7"><label for="sg7">SG</label>　
										<input name="pos7[]" type="radio" value="SF" id="sf7"><label for="sf7">SF</label>　
										<input name="pos7[]" type="radio" value="PF" id="pf7"><label for="pf7">PF</label>　
										<input name="pos7[]" type="radio" value="C" id="cc7"><label for="cc7">C</label>
									</td>
								</tr>
								<!--選手8-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手8</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name8" type="text" size="36"><br>
										カナ：<input name="kana8_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall8_num" type="text" size="8"> cm　
										<input name="pos8[]" type="radio" value="PG" id="pg8"><label for="pg8">PG</label>　
										<input name="pos8[]" type="radio" value="SG" id="sg8"><label for="sg8">SG</label>　
										<input name="pos8[]" type="radio" value="SF" id="sf8"><label for="sf8">SF</label>　
										<input name="pos8[]" type="radio" value="PF" id="pf8"><label for="pf8">PF</label>　
										<input name="pos8[]" type="radio" value="C" id="cc8"><label for="cc8">C</label>
									</td>
								</tr>
								<!--選手9-->
								<tr>
									<th rowspan="2" class="players">選手9</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name9" type="text" size="36"><br>
										カナ：<input name="kana9_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall9_num" type="text" size="8"> cm　
										<input name="pos9[]" type="radio" value="PG" id="pg9"><label for="pg9">PG</label>　
										<input name="pos9[]" type="radio" value="SG" id="sg9"><label for="sg9">SG</label>　
										<input name="pos9[]" type="radio" value="SF" id="sf9"><label for="sf9">SF</label>　
										<input name="pos9[]" type="radio" value="PF" id="pf9"><label for="pf9">PF</label>　
										<input name="pos9[]" type="radio" value="C" id="cc9"><label for="cc9">C</label>
									</td>
								</tr>
								<!--選手10-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手10</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name10" type="text" size="36"><br>
										カナ：<input name="kana10_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall10_num" type="text" size="8"> cm　
										<input name="pos10[]" type="radio" value="PG" id="pg10"><label for="pg10">PG</label>　
										<input name="pos10[]" type="radio" value="SG" id="sg10"><label for="sg10">SG</label>　
										<input name="pos10[]" type="radio" value="SF" id="sf10"><label for="sf10">SF</label>　
										<input name="pos10[]" type="radio" value="PF" id="pf10"><label for="pf10">PF</label>　
										<input name="pos10[]" type="radio" value="C" id="cc10"><label for="cc10">C</label>
									</td>
								</tr>
								<!--選手11-->
								<tr>
									<th rowspan="2" class="players">選手11</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name11" type="text" size="36"><br>
										カナ：<input name="kana11_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall11_num" type="text" size="8"> cm　
										<input name="pos11[]" type="radio" value="PG" id="pg11"><label for="pg11">PG</label>　
										<input name="pos11[]" type="radio" value="SG" id="sg11"><label for="sg11">SG</label>　
										<input name="pos11[]" type="radio" value="SF" id="sf11"><label for="sf11">SF</label>　
										<input name="pos11[]" type="radio" value="PF" id="pf11"><label for="pf11">PF</label>　
										<input name="pos11[]" type="radio" value="C" id="cc11"><label for="cc11">C</label>
									</td>
								</tr>
								<!--選手12-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手12</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name12" type="text" size="36"><br>
										カナ：<input name="kana12_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall12_num" type="text" size="8"> cm　
										<input name="pos12[]" type="radio" value="PG" id="pg12"><label for="pg12">PG</label>　
										<input name="pos12[]" type="radio" value="SG" id="sg12"><label for="sg12">SG</label>　
										<input name="pos12[]" type="radio" value="SF" id="sf12"><label for="sf12">SF</label>　
										<input name="pos12[]" type="radio" value="PF" id="pf12"><label for="pf12">PF</label>　
										<input name="pos12[]" type="radio" value="C" id="cc12"><label for="cc12">C</label>
									</td>
								</tr>
								<!--選手13-->
								<tr>
									<th rowspan="2" class="players">選手13</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name13" type="text" size="36"><br>
										カナ：<input name="kana13_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall13_num" type="text" size="8"> cm　
										<input name="pos13[]" type="radio" value="PG" id="pg13"><label for="pg13">PG</label>　
										<input name="pos13[]" type="radio" value="SG" id="sg13"><label for="sg13">SG</label>　
										<input name="pos13[]" type="radio" value="SF" id="sf13"><label for="sf13">SF</label>　
										<input name="pos13[]" type="radio" value="PF" id="pf13"><label for="pf13">PF</label>　
										<input name="pos13[]" type="radio" value="C" id="cc13"><label for="cc13">C</label>
									</td>
								</tr>
								<!--選手14-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手14</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name14" type="text" size="36"><br>
										カナ：<input name="kana14_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall14_num" type="text" size="8"> cm　
										<input name="pos14[]" type="radio" value="PG" id="pg14"><label for="pg14">PG</label>　
										<input name="pos14[]" type="radio" value="SG" id="sg14"><label for="sg14">SG</label>　
										<input name="pos14[]" type="radio" value="SF" id="sf14"><label for="sf14">SF</label>　
										<input name="pos14[]" type="radio" value="PF" id="pf14"><label for="pf14">PF</label>　
										<input name="pos14[]" type="radio" value="C" id="cc14"><label for="cc14">C</label>
									</td>
								</tr>
								<!--選手15-->
								<tr>
									<th rowspan="2" class="players">選手15</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name15" type="text" size="36"><br>
										カナ：<input name="kana15_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall15_num" type="text" size="8"> cm　
										<input name="pos15[]" type="radio" value="PG" id="pg15"><label for="pg15">PG</label>　
										<input name="pos15[]" type="radio" value="SG" id="sg15"><label for="sg15">SG</label>　
										<input name="pos15[]" type="radio" value="SF" id="sf15"><label for="sf15">SF</label>　
										<input name="pos15[]" type="radio" value="PF" id="pf15"><label for="pf15">PF</label>　
										<input name="pos15[]" type="radio" value="C" id="cc15"><label for="cc15">C</label>
									</td>
								</tr>
								<!--選手16-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手16</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name16" type="text" size="36"><br>
										カナ：<input name="kana16_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall16_num" type="text" size="8"> cm　
										<input name="pos16[]" type="radio" value="PG" id="pg16"><label for="pg16">PG</label>　
										<input name="pos16[]" type="radio" value="SG" id="sg16"><label for="sg16">SG</label>　
										<input name="pos16[]" type="radio" value="SF" id="sf16"><label for="sf16">SF</label>　
										<input name="pos16[]" type="radio" value="PF" id="pf16"><label for="pf16">PF</label>　
										<input name="pos16[]" type="radio" value="C" id="cc16"><label for="cc16">C</label>
									</td>
								</tr>
								<!--選手17-->
								<tr>
									<th rowspan="2" class="players">選手17</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name17" type="text" size="36"><br>
										カナ：<input name="kana17_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr>
									<th>身長 / ポジション</th>
									<td>
										<input name="tall17_num" type="text" size="8"> cm　
										<input name="pos17[]" type="radio" value="PG" id="pg17"><label for="pg17">PG</label>　
										<input name="pos17[]" type="radio" value="SG" id="sg17"><label for="sg17">SG</label>　
										<input name="pos17[]" type="radio" value="SF" id="sf17"><label for="sf17">SF</label>　
										<input name="pos17[]" type="radio" value="PF" id="pf17"><label for="pf17">PF</label>　
										<input name="pos17[]" type="radio" value="C" id="cc17"><label for="cc17">C</label>
									</td>
								</tr>
								<!--選手18-->
								<tr class="bgw">
									<th rowspan="2" class="players">選手18</th>
									<th>氏名 / ヨミカナ</th>
									<td>
										氏名：<input name="name18" type="text" size="36"><br>
										カナ：<input name="kana18_jpk" type="text" size="36"> <small>カタカナのみ</small>
									</td>
								</tr>
								<tr class="bgw">
									<th>身長 / ポジション</th>
									<td>
										<input name="tall18_num" type="text" size="8"> cm　
										<input name="pos18[]" type="radio" value="PG" id="pg18"><label for="pg18">PG</label>　
										<input name="pos18[]" type="radio" value="SG" id="sg18"><label for="sg18">SG</label>　
										<input name="pos18[]" type="radio" value="SF" id="sf18"><label for="sf18">SF</label>　
										<input name="pos18[]" type="radio" value="PF" id="pf18"><label for="pf18">PF</label>　
										<input name="pos18[]" type="radio" value="C" id="cc18"><label for="cc18">C</label>
									</td>
								</tr>
								<tr class="submitArea">
									<td colspan="3">
										<!--<p class="yusen alert">7月末までは【リーガ東海・B2L】に所属するチームの<br>優先受付期間となります</p>-->
										<!--<input type="hidden" name="category" value="5on5 チーム選手登録">-->
										<input type="hidden" name="rep[member1]" value="{name1}({kana1}) | {tall1}cm | {pos1}">
										<input type="hidden" name="rep[member2]" value="{name2}({kana2}) | {tall2}cm | {pos2}">
										<input type="hidden" name="rep[member3]" value="{name3}({kana3}) | {tall3}cm | {pos3}">
										<input type="hidden" name="rep[member4]" value="{name4}({kana4}) | {tall4}cm | {pos4}">
										<input type="hidden" name="rep[member5]" value="{name5}({kana5}) | {tall5}cm | {pos5}">
										<input type="hidden" name="rep[member6]" value="{name6}({kana6}) | {tall6}cm | {pos6}">
										<input type="hidden" name="rep[member7]" value="{name7}({kana7}) | {tall7}cm | {pos7}">
										<input type="hidden" name="rep[member8]" value="{name8}({kana8}) | {tall8}cm | {pos8}">
										<input type="hidden" name="rep[member9]" value="{name9}({kana9}) | {tall9}cm | {pos9}">
										<input type="hidden" name="rep[member10]" value="{name10}({kana10}) | {tall10}cm | {pos10}">
										<input type="hidden" name="rep[member11]" value="{name11}({kana11}) | {tall11}cm | {pos11}">
										<input type="hidden" name="rep[member12]" value="{name12}({kana12}) | {tall12}cm | {pos12}">
										<input type="hidden" name="rep[member13]" value="{name13}({kana13}) | {tall13}cm | {pos13}">
										<input type="hidden" name="rep[member14]" value="{name14}({kana14}) | {tall14}cm | {pos14}">
										<input type="hidden" name="rep[member15]" value="{name15}({kana15}) | {tall15}cm | {pos15}">
										<input type="hidden" name="rep[member16]" value="{name16}({kana16}) | {tall16}cm | {pos16}">
										<input type="hidden" name="rep[member17]" value="{name17}({kana17}) | {tall17}cm | {pos17}">
										<input type="hidden" name="rep[member18]" value="{name18}({kana18}) | {tall18}cm | {pos18}">
										<?php if ( $blnSetTeam == TRUE ) : ?>
										<input type="hidden" name="require" value="member1,member2,member3,member4,member5,confmailflg">
										<?php else : ?>
										<input type="hidden" name="require" value="member1,member2,member3,member4,member5">
										<?php endif; ?>
										<button id="submit" type="submit">入力内容を確認する</button>
										<button type="reset" id="myreset">リセット</button>
									</td>
								</tr>
							</table>
						</fieldset>
					</form>
				</div>
			</section>
		</main>
	</div>
	<aside id="decision">
		<h2>Aichi BasketBall Classic</h2>
		<h3>【 愛知最強5on5トーナメント決定戦 】</h3>
		<h4>Aichi Basketball Classic「5on5トーナメント決定戦」とは</h4>
		<ul class="inner">
			<li>TBB3x3の主催大会</li>
			<li>BUZZER BEATERの主催大会</li>
			<li>LIGA TOKAI 3on3 MIXTURE大会</li>
		</ul>
		<p class="inner">
			上記の愛知で開催された3on3大会の主催者が共同で開催する大会で、2016年10月9日〜30日の約1か月で行われる愛知最強の5on5のチャンピオンチームを決定する大会です！
		</p>
		<h4>愛知最強5on5トーナメント決定戦 大会概要</h4>
		<dl class="inner">
			<dt>日程</dt><dd>2016年10月09日(日)：一回戦<br>　 2016年10月16日(日)：二回戦<br>　 2016年10月23日(日)：三回戦＆四回戦<br>　 2016年10月30日(日)：準決勝＆決勝</dd>
			<dt>場所</dt><dd>北名古屋市・小牧市・名古屋市を予定</dd>
			<dt>募集</dt><dd>先着64チーム</dd>
			<dt>形式</dt><dd>トーナメント戦</dd>
		</dl>
		<img src="../common/image/cm.jpg" alt="愛知最強決定戦 [ Aichi BasketBall Classic ] 5on5トーナメント">
	</aside>
	<footer id="pageFoot" role="contentinfo">
		<div id="copylight">
			<span>Copyright (C) 2016 Aichi BasketBall Classic All Rights Resurved.</span>
		</div>
	</footer>
</div>

<script src="../../common/js/jquery-1.11.2.min.js"></script>
<script src="../../common/js/main.js"></script>

</body>
</html>
