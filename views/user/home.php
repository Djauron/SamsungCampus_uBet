<div id="video_twitch">
	<iframe src="https://player.twitch.tv/?channel=lpl1" frameborder="0" allowfullscreen="true" scrolling="no"></iframe>
	<a href="https://www.twitch.tv/lpl1?tt_medium=live_embed&tt_content=text_link"></a>
</div>


<?php foreach($event as $affEvent){ 
	?>
<div class="container event-aff">
	<div class="row">
		<div class="[ col-xs-12 col-sm-12 ]">
			<ul class="event-list">
				<li>
					<img alt="logo" src="<?= $affEvent['logo1'] ?>" class="left" />
					<img alt="logo" src="<?= $affEvent['logo2'] ?>" class="right" />
					<div class="info">
						<div class="left">
							<h2 class="title"><?= $affEvent['team1'] ?></h2>
							<p class="desc">Cote : <?=$affEvent['cote1']?></p>
						</div>

						<div class="right">
							<h2 class="title"><?=$affEvent['team2']?></h2>
							<p class="desc right">Cote : <?=$affEvent['cote2']?></p>
						</div>

						<div class="position-date">
							<p>Date de debut des paris : <?= $affEvent['date_debut'] ?></p>
							<p>Date de fin des paris : <?= $affEvent['date_fin'] ?></p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php } ?>
