<h2>Viewing <span class='muted'>#<?php echo $article->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $article->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $article->body; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $article->user_id; ?></p>

<?php echo Html::anchor('articles/edit/'.$article->id, 'Edit'); ?> |
<?php echo Html::anchor('articles', 'Back'); ?>