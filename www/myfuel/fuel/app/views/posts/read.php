<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('posts/create','Create');?></li>
	<li class='<?php echo Arr::get($subnav, "read" ); ?>'><?php echo Html::anchor('posts/read','Read');?></li>
	<li class='<?php echo Arr::get($subnav, "update" ); ?>'><?php echo Html::anchor('posts/update','Update');?></li>
	<li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('posts/delete','Delete');?></li>

</ul>
<p>Read</p>