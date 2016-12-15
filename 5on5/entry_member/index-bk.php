<?php

$blnMaintenanceMode = FALSE; // メンテナンスモード　FALSE:通常運用	TRUE:メンテナンス状態

if ( $blnMaintenanceMode == TRUE ) {
	header("Location: ./maintenance.php");
}
require_once('set_team.php');

$blnSetTeam = FALSE;
$blnPlayLigatokai = FALSE;
$arySetTeamData = array();
$intMemberMax = 18;

// パスワードからチーム情報を取得
if ( isset($_GET['pw']) == TRUE ) {
	$strPw = preFilters($_GET['pw']);
	// ハイフン削除
	$strPw = str_replace('ー', '', $strPw);
	$strPw = str_replace('-', '', $strPw);
	// 半角数字変換
	$strPw = mb_convert_kana($strPw, "n");

	$intTeamCnt = count($aryTeamData);
	for ( $i=0; $i<$intTeamCnt; $i++ ) {
		// パスワードにHITした場合はチーム名とフラグを立てる
		if ( $aryTeamData[$i]['PASSWORD'] === $strPw ) {
			$arySetTeamData = $aryTeamData[$i];
			$blnSetTeam = TRUE;
			// リーガ東海参加チームの場合
			if ( $aryTeamData[$i]['LIGATOKAI'] === TRUE ) {
				$blnPlayLigatokai = TRUE;
			}
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
									<td colspan="2">
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
								<tr id="confs">
									<th colspan="2" class="dataSub">確認メール</th>
									<td colspan="2">
										<input name="reply" type="radio" value="false" checked="checked" id="mailoff"><label for="mailoff">不要</label>　
										<input name="reply" type="radio" value="true" id="mailon"><label for="mailon">必要</label><br>
										宛先：<input name="email" type="text" size="43" value="<?php echo $arySetTeamData['REP_MAIL']; ?>">
									</td>
								</tr>
								<?php else : ?>
								<tr>
									<th colspan="2" class="dataSub">メールアドレス <small class="alert">※</small></th>
									<td colspan="2">
										<input name="email" type="text" size="43"><br>
<!--										<small>登録内容の控えメールが必要な場合は、ご入力ください</small>-->
									</td>
								</tr>
								<?php endif; ?>
								<?php if ( $blnPlayLigatokai == TRUE ) : ?>
								<tr id="ligamenber">
									<th colspan="2" class="dataSub">リーガ東海2016-17シーズン<br>とのメンバー構成</th>
									<td colspan="2">
										<input name="ligamenbers" type="radio" value="そのまま" id="ligaon"><label for="ligaon"> そのまま</label>
										（選手登録の記入の必要はありません。）<br>
										<input name="ligamenbers" type="radio" value="一部変更" id="ligasome" checked="checked"><label for="ligasome"> 一部変更</label>
										（対象選手の情報を記入してください。）
									</td>
								</tr>
								<?php endif; ?>
								<?php for ( $i=1; $i<=$intMemberMax; $i++ ) : ?>
								<tr class="setPlayers<?= ($i % 2 == 1) ? ' bgw' : ''; ?>">
									<th rowspan="2" class="players">選手<?= $i; ?><?php if($i <= 5 && $blnPlayLigatokai == FALSE): ?> <small class="alert">※</small><?php endif; ?></th>
									<th>背番号 / 氏名(ヨミカナ)</th>
									<td>
										No. <input name="number<?= $i; ?><?php if($i <= 5 && $blnPlayLigatokai == FALSE): ?>_req<?php endif; ?>_num" type="number" size="6" maxlength="3" min="0" max="99">
									</td>
									<td>
										氏名：<input name="name<?= $i; ?><?php if($i <= 5 && $blnPlayLigatokai == FALSE): ?>_req<?php endif; ?>" type="text" size="40"><br>
										カナ：<input name="kana<?= $i; ?><?php if($i <= 5 && $blnPlayLigatokai == FALSE): ?>_req<?php endif; ?>_jpk" type="text" size="40"placeholder="カタカナのみ">
									</td>
								</tr>
								<tr class="setPlayers<?= ($i % 2 == 1) ? ' bgw' : ''; ?>">
									<th>身長 / ポジション</th>
									<td colspan="2">
										<input name="tall<?= $i; ?><?php if($i <= 5 && $blnPlayLigatokai == FALSE): ?>_req<?php endif; ?>_num" type="number" size="6" maxlength="3" min="140" max="230"> cm&nbsp;/&nbsp;
										<input name="pos<?= $i; ?>[]" type="radio" value="PG" id="pg<?= $i; ?>"><label for="pg<?= $i; ?>"> PG</label>　
										<input name="pos<?= $i; ?>[]" type="radio" value="SG" id="sg<?= $i; ?>"><label for="sg<?= $i; ?>"> SG</label>　
										<input name="pos<?= $i; ?>[]" type="radio" value="SF" id="sf<?= $i; ?>"><label for="sf<?= $i; ?>"> SF</label>　
										<input name="pos<?= $i; ?>[]" type="radio" value="PF" id="pf<?= $i; ?>"><label for="pf<?= $i; ?>"> PF</label>　
										<input name="pos<?= $i; ?>[]" type="radio" value="C" id="cc<?= $i; ?>"><label for="cc<?= $i; ?>"> C</label>
									</td>
								</tr>
								<?php endfor; ?>
								<tr id="messageArea" class="bgw">
									<th colspan="2" class="dataSub">メッセージ</th>
									<td colspan="2">
										<textarea name="message" cols="59" rows="5"></textarea>
									</td>
								</tr>
								<tr class="submitArea">
									<td colspan="4">
										<!--<p class="yusen alert">7月末までは【リーガ東海・B2L】に所属するチームの<br>優先受付期間となります</p>-->
										<!--<input type="hidden" name="category" value="5on5 チーム選手登録">-->
										<?php for ( $i=1; $i<=$intMemberMax; $i++ ) : ?>
										<input type="hidden" name="rep[member<?= $i; ?>]" value="No.{number<?= $i; ?>} | {name<?= $i; ?>}({kana<?= $i; ?>}) | {tall<?= $i; ?>}cm | {pos<?= $i; ?>}">
										<?php endfor; ?>
										<?php if ( $blnPlayLigatokai == FALSE ) : ?>
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
			<dt>場所</dt><dd>北名古屋市総合体育館・健康ドーム</dd>
			<dt>参加</dt><dd>32チーム</dd>
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
<script src="./common/js/main.js"></script>

</body>
</html>
